<?php

namespace App\Http\Controllers;

use App\Models\ActivityTable;
use App\Models\Study;
use App\Models\User;
use App\Utilities\RetrieveREDCapData;
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
        ActivityTable::StoreMyActivity($vm->pageTitle, 'Loading');
        $vm->handle();
        return view('home.home')
            ->with('vm', $vm)
            ->with('pageTitle', $vm->pageTitle);
    }

    public function where() {
        $pageTitle = 'Where am I in my study journey';
        $studyName = "Not Set";
        $randoDate = date('Y-m-d');
        $id = Auth::id();
        $user = User::find($id);
        if ( isset($user->studyid) && $user->studyid > 0 ) {
            $study = Study::find($user->studyid);
            if ( isset($study) ) {
                $randoNum = $user->randomisation_number;
                $studyName = $study->studyname;
                try {
                    $rc = new RedCapProject($study->apiurl, $study->apikey);
                    $records = $rc->exportReports($study->studyrandomisationreportid, 'php', 'label');
                    $myRandoRec = array();
                    if ( isset($records) ) {
                        $myRandoRec = $this->filterArrayByValue($records, $study->randonumfield, $randoNum);
                    }
                    if ( count($myRandoRec) > 0 ) {
                        $recordID = $myRandoRec[0]['record_id'];
                        $completers = $rc->exportReports($study->studystatusreportid, 'php', 'label');
                        $myRec = array();
                        if ( isset($completers) ) {
                            $myRec = $this->filterArrayByValue($completers, 'record_id', $recordID);
                            if ( isset( $myRec ) ) {
                                $events = $rc->exportEvents();
                                $mapping = $rc->exportInstrumentEventMappings();

                                $mappingData = array();

                                foreach ( $events as $evt ) {
                                    $evtName = $evt['event_name'];
                                    $mappingData[$evtName] = array();
                                    $mappingData[$evtName]['display_name'] = $evtName;
                                    $mappingData[$evtName]['visit'] = $evtName;
                                    $mappingData[$evtName]['event'] = $evt['unique_event_name'];
                                    $mappingData[$evtName]['offset'] = $evt['day_offset'];
                                    $mappingData[$evtName]['range'] = $evt['day_offset'] + $evt['offset_max'];
                                    $armid = $evt['unique_event_name'];
                                    $evtInstrum = $this->filterArrayByValue( $mapping, 'unique_event_name', $armid);
                                    if ( count($evtInstrum) > 0 ) {
                                        $mappingData[$evtName]['initial_instrument'] = $evtInstrum[0]['form'];
                                        $mappingData[$evtName]['visit_instruments'] = '';
                                        foreach ($evtInstrum as $row) {
                                            if (strlen($mappingData[$evtName]['visit_instruments']) == 0) {
                                                $mappingData[$evtName]['visit_instruments'] = $row['form'];
                                            } else {
                                                $mappingData[$evtName]['visit_instruments'] = $mappingData[$evtName]['visit_instruments'] . ',' . $row['form'];
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
            ->with('pageTitle', $pageTitle);
    }

    public function progress() {
        $pageTitle = 'The progress of the Study';
        $studyName = "Not set";
        $recruitNumber = "Not set";
        $expected = "683";

        $id = Auth::id();
        $user = User::find($id);
        if ( isset($user->studyid) && $user->studyid > 0 ) {
            $study = Study::find($user->studyid);
            if ( isset($study) ) {
                $studyName = $study->studyname;
                $randoNum = $user->randomisation_number;
                $expected = $study->expectedrecruits;
                try {
                    $rc = new RedCapProject($study->apiurl, $study->apikey);
                    $records = $rc->exportReports($study->studyrandomisationreportid, 'php', 'label');
                    $myRandoRec = array();
                    if ( isset($records) ) {
                        $myRandoRec = $this->filterArrayByValue($records, $study->randonumfield, $randoNum);
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
            ->with('expected', $expected)
            ->with('pageTitle', $pageTitle);
    }

    public function due() {
        $pageTitle = 'What is due for me next?';
        $studyName = "Not Set";

        $id = Auth::id();
        $user = User::find($id);
        if ( isset($user->studyid) && $user->studyid > 0 ) {
            $study = Study::find($user->studyid);
            if (isset($study)) {
                $studyName = $study->studyname;
            }
        }

        return view('home.due')
            ->with('studyName', $studyName)
            ->with('pageTitle', $pageTitle);
    }

    public function Contact() {
        $studyName = "Not Set";
        $email = "Not Set";
        $phone = "Not Set";
        $address = "Not Set";

        $id = Auth::id();
        $user = User::find($id);
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
