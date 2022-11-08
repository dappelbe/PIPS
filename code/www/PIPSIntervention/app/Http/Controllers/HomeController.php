<?php

namespace App\Http\Controllers;

use App\Models\ActivityTable;
use App\Models\Study;
use App\Models\StudyVisitDetails;
use App\Models\User;
use App\Utilities\IRetrieveREDCapData;
use App\Utilities\RetrieveREDCapData;
use App\Utilities\Util;
use App\ViewModels\Home\IndexViewModel;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use IU\PHPCap\PhpCapException;
use IU\PHPCap\RedCapProject;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application home page.
     *
     * @return Application|Factory|View
     */
    public function root(): View|Factory|Application
    {
        return redirect('/');
    }

    /**
     * Show the application dashboard.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $rcData = new RetrieveREDCapData();
        $vm = new IndexViewModel($rcData);
        $vm->handle();
        ActivityTable::StoreMyActivity($vm->pageTitle, 'Loading');
        return view('home.home')
            ->with('vm', $vm)
            ->with('pageTitle', $vm->pageTitle);
    }

    public function where() {
        $pageTitle = 'Where am I in my study journey';
        $studyName = "Not Set";
        $randoDate = date('Y-m-d');
        $mappingData = array();

        ActivityTable::StoreMyActivity($pageTitle, 'Accessed');
        $id = Auth::id();
        $user = User::find($id);
        if ( isset($user->studyid) && $user->studyid > 0 ) {
            $study = Study::find($user->studyid);
            if ( isset($study) ) {
                $randoNum = $user->randomisation_number;
                $studyName = $study->studyname;
                try {
                    $visitInfo = StudyVisitDetails::all()->toArray();
                    $rc = new RedCapProject($study->apiurl, $study->apikey);
                    $records = $rc->exportReports($study->studyrandomisationreportid, 'php', 'label');
                    $myRandoRec = array();
                    if ( isset($records) ) {
                        $myRandoRec = Util::filterArrayByValue($records, $study->randonumfield, $randoNum);
                    }
                    if ( count($myRandoRec) > 0 ) {
                        $recordID = $myRandoRec[0]['record_id'];
                        $completers = $rc->exportReports($study->studystatusreportid, 'php', 'label');
                        $myRec = array();
                        if ( isset($completers) ) {
                            $myRec = Util::filterArrayByValue($completers, 'record_id', $recordID);
                            if ( isset( $myRec ) ) {
                                $events = $rc->exportEvents();
                                $mapping = $rc->exportInstrumentEventMappings();

                                foreach ( $events as $evt ) {
                                    $evtName = $evt['event_name'];
                                    $armid = $evt['unique_event_name'];
                                    $evtInstrum = Util::filterArrayByValue( $mapping, 'unique_event_name', $armid);
                                    $myStatus = Util::filterArrayByValue( $myRec, 'redcap_event_name', $evtName);
                                    $theVisit = Util::filterArrayByValue( $visitInfo, 'visit_display_name', $evtName);
                                    if ( count($theVisit) > 0 ) {
                                        $mappingData[$evtName] = array();
                                        $mappingData[$evtName]['display_name'] = $evtName;
                                        $mappingData[$evtName]['visit'] = $evtName;
                                        $mappingData[$evtName]['event'] = $evt['unique_event_name'];
                                        $mappingData[$evtName]['offset'] = $evt['day_offset'];
                                        $mappingData[$evtName]['range'] = $evt['day_offset'] + $evt['offset_max'];
                                        $mappingData[$evtName]['formstatus'] = '';
                                        $mappingData[$evtName]['comments'] = '';
                                        $mappingData[$evtName]['comments'] = $theVisit[0]['comment'];

                                        if (count($evtInstrum) > 0) {
                                            $mappingData[$evtName]['initial_instrument'] = $evtInstrum[0]['form'];
                                            $mappingData[$evtName]['visit_instruments'] = '';
                                            foreach ($evtInstrum as $row) {
                                                if (strlen($mappingData[$evtName]['visit_instruments']) == 0) {
                                                    $mappingData[$evtName]['visit_instruments'] = $row['form'];
                                                } else {
                                                    $mappingData[$evtName]['visit_instruments'] = $mappingData[$evtName]['visit_instruments'] . ',' . $row['form'];
                                                }
                                                //-- Now look to see if we have completed the instrument
                                                if (count($myStatus) > 0) {
                                                    if (array_key_exists($row['form'] . '_complete', $myStatus[0])) {
                                                        if ($myStatus[0][$row['form'] . '_complete'] == "Complete") {
                                                            $mappingData[$evtName]['formstatus'] .= sprintf('<span class="badge badge-success" style="background-color: green;">%s</span>&#160;', $row['form']);
                                                        } else {
                                                            $mappingData[$evtName]['formstatus'] .= sprintf('<span class="badge badge-danger" style="background-color: red;">%s</span>&#160;', $row['form']);
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                } catch (PhpCapException $exception) {
                    Log::error($exception->getMessage());
                }


            }
        }



        return view('home.where')
            ->with('studyName', $studyName)
            ->with('randoDate', $randoDate)
            ->with('mappingData', $mappingData)
            ->with('pageTitle', $pageTitle);
    }

    public function progress() {
        $pageTitle = 'The progress of the Study';
        $studyName = "Not set";
        $recruitNumber = "Not set";
        $expected = "683";
        ActivityTable::StoreMyActivity($pageTitle, 'Accessed');

        $id = Auth::id();
        $user = User::find($id);
        if ( isset($user->studyid) && $user->studyid > 0 ) {
            $study = Study::find($user->studyid);
            if ( isset($study) ) {
                $studyName = $study->studyname;
                $randoNum = $user->randomisation_number;
                $expected = $study->expectedrecruits;
                $recruitlink = $study->studyaccruallink;
                try {
                    $rc = new RedCapProject($study->apiurl, $study->apikey);
                    $records = $rc->exportReports($study->studyrandomisationreportid, 'php', 'label');
                    $myRandoRec = array();
                    if ( isset($records) ) {
                        $myRandoRec = Util::filterArrayByValue($records, $study->randonumfield, $randoNum);
                    }
                    if ( count($myRandoRec) > 0 ) {
                        $ctr = 0;
                        foreach ($records as $row ) {
                            $ctr++;
                            if ($row[$study->randonumfield] == $randoNum) {
                                break;
                            }
                        }
                        $recruitNumber = $ctr;
                        if ( str_ends_with($ctr, '1') ) {
                            $recruitNumber = $recruitNumber . '<sup>st</sup>';
                        } else if ( str_ends_with($ctr, '2') ) {
                            $recruitNumber = $recruitNumber . '<sup>nd</sup>';
                        } else if ( str_ends_with($ctr, '3') ) {
                            $recruitNumber = $recruitNumber . '<sup>rd</sup>';
                        } else {
                            $recruitNumber = $recruitNumber . '<sup>th</sup>';
                        }
                    }
                } catch (PhpCapException $exception) {
                    Log::error($exception->getMessage());
                }


            }
        }

        return view('home.progress')
            ->with('studyName', $studyName)
            ->with('recruitNumber', $recruitNumber)
            ->with('recruitlink', $recruitlink)
            ->with('expected', $expected)
            ->with('pageTitle', $pageTitle);
    }

    public function due() {
        $pageTitle = 'What is due for me next?';
        $studyName = "Not Set";
        $redcapProject = new RetrieveREDCapData();
        $daysSinceRandomisation = 0;
        $records = array();
        $next = 'Your next visit is the <strong>unknown</strong>';
        $reminder = 'Unknown';
        ActivityTable::StoreMyActivity($pageTitle, 'Accessed');

        $id = Auth::id();
        $user = User::find($id);
        if ( isset($user->studyid) && $user->studyid > 0 ) {
            $study = Study::find($user->studyid);
            if (isset($study)) {
                $studyName = $study->studyname;
                $redcapProject->openProject($study->apiurl, $study->apikey);
                $records = $redcapProject->exportReportsAsArrayWithLabels($study->studyrandomisationreportid);
                $myRandoRec = Util::filterArrayByValue($records, $study->randonumfield, $user->randomisation_number);
                $myRandoDate = new \DateTime( $myRandoRec[0][$study->randodatefield]);
                $today = new \DateTime(date('Y-m-d'));

                $daysSinceRandomisation = $myRandoDate->diff($today)->format('%a');

                $studyVisits = StudyVisitDetails::where('study_id', '=', $user->studyid)
                    ->orderBy('offset')
                    ->get()
                    ->toArray();

                if (!is_null($studyVisits))
                {
                    $oldHiDay = 0;
                    foreach ($studyVisits as $visit)
                    {
                        $lowDay = $visit['offset'];
                        $hiDay = $visit['offset'] + $visit['range'];
                        if ( $daysSinceRandomisation >= $lowDay && $daysSinceRandomisation <= $hiDay )
                        {
                            $next = sprintf("You are currently at the <strong>%s</strong> visit.",
                                $visit['visit_display_name']);
                            $reminder = "You will have received a reminder about completing this visit,"
                                        . "if not please contact the study team."
                                        . "<br/>If you have completed your questions for this visit - Thank you!";
                            break;
                        }
                        if ($daysSinceRandomisation < $lowDay && $daysSinceRandomisation > $oldHiDay)
                        {
                            $next = sprintf("Your next visit is the <strong>%s</strong>",
                                $visit['visit_display_name']);

                            $nextVisitDate = new \DateTime( date('Y-m-d',
                                strtotime($myRandoRec[0][$study->randodatefield] . '+' . $visit['offset'] . ' day')));
                            $daysDiff = $nextVisitDate->diff($today)->format('%a');

                            $reminder = sprintf("We will send you a reminder in <strong>%s</strong> day(s).", $daysDiff);
                            break;
                        }
                        $oldHiDay = $hiDay;
                    }

                }
            }
        }

        return view('home.due')
            ->with('studyName', $studyName)
            ->with('pageTitle', $pageTitle)
            ->with('next', $next)
            ->with('reminder', $reminder);
    }

    public function Contact() {
        $studyName = "Not Set";
        $email = "Not Set";
        $phone = "Not Set";
        $address = "Not Set";

        $id = Auth::id();
        $user = User::find($id);
        ActivityTable::StoreMyActivity("Contact Page", 'Accessed');

        if ( isset($user->studyid) && $user->studyid > 0 ) {
            $study = Study::find($user->studyid);
            if (isset($study)) {
                $studyName = $study->studyname;
                $phone = $study->studyphone;
                $email = $study->studyemail;
                $address = str_replace(PHP_EOL, '<br/>', $study->studyaddress);
            }
        }

        $pageTitle = 'How do I contact the $studyName team?';


        return view('home.contact')
            ->with('studyName', $studyName)
            ->with('email', $email)
            ->with('phone', $phone)
            ->with('address', $address)
            ->with('pageTitle', $pageTitle);
    }


}
