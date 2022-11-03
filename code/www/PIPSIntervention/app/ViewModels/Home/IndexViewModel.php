<?php

namespace App\ViewModels\Home;

use App\Models\ActivityTable;
use App\Models\ConsentForm;
use App\Models\Study;
use App\Models\User;
use App\Utilities\IRetrieveREDCapData;
use App\Utilities\Util;
use Illuminate\Support\Facades\Auth;

class IndexViewModel
{
    private string $notSet = "Not set";
    public string $pageTitle = "PIPs: Dashboard";

    public string $allocation;
    public string|int|null $id = -1;
    public string $lastLogin = 'Never';
    public string $randoNum;
    public string $recruitNumber;
    public string $siteName;
    public string $studyEmail;
    public string $studyName;
    public string $pis;
    public string $consentFormLink;

    public IRetrieveREDCapData $redcapProject;
    public User|null $user = null;

    public function __construct( IRetrieveREDCapData $rcData)
    {
        $this->allocation = $this->notSet;
        $this->id = Auth::id();
        $this->randoNum = $this->notSet;
        $this->recruitNumber = $this->notSet;
        $this->redcapProject = $rcData;
        $this->siteName = $this->notSet;
        $this->studyEmail = $this->notSet;
        $this->studyName = $this->notSet;
        $this->pis = $this->notSet;
        $this->consentFormLink = $this->notSet;
        $this->user = (new User())->find($this->id);
    }

    public function handle() : void {
        $study = (new Study())->find($this->user->studyid);
        if ( isset($study) ) {
            $this->studyName = $study->studyname;
            $this->studyEmail = $study->studyemail;
            $this->randoNum = $this->user['randomisation_number'];
            $this->redcapProject->openProject($study->apiurl, $study->apikey);
            $records = $this->redcapProject->exportReportsAsArrayWithLabels($study->studyrandomisationreportid);
            $myRandoRec = Util::filterArrayByValue($records, $study->randonumfield, $this->randoNum);
            if ( count($myRandoRec) > 0 ) {
                if (array_key_exists($study->sitenamefield, $myRandoRec[0])) {
                    $this->siteName = $myRandoRec[0][$study->sitenamefield];
                }
                if (array_key_exists($study->allocationfield, $myRandoRec[0])) {
                    $this->allocation = $myRandoRec[0][$study->allocationfield];
                }
            }
            $ctr = 0;
            foreach ($records as $row ) {
                $ctr++;
                if (array_key_exists($study->randonumfield, $row) && $row[$study->randonumfield] == $this->randoNum) {
                    break;
                }
            }
            $this->recruitNumber = Util::AddHTMLSuperscriptOrdinal($ctr);
            $this->pis = $study->getPISFilesAsHTMLList('pis');

            $allConsentForms = ConsentForm::all()->toArray();
            $myConsentForm = Util::filterArrayByValue( $allConsentForms, 'record_id', $this->randoNum);
            if ( count($myConsentForm) > 0 ) {
                $this->consentFormLink = route( 'consentforms.view', $myConsentForm[0]['id']);
            }

            if ( !is_null($this->user->last_login_at ) ) {
                $lastActivity = ActivityTable::where([
                    ['user_id','=',$this->user->id],
                    ['activity','=','PIPs: Dashboard'],
                ])->latest('updated_at')->get()->toArray();

                if ( count($lastActivity) > 0 )
                {
                    $this->lastLogin = date('l d F Y', strtotime($lastActivity[0]['updated_at'])) . ' at ' .
                        date('H:i', strtotime($lastActivity[0]['updated_at']));
                }
            }
            $fName = $this->randoNum . "_consent_form.pdf";
            if ( \File::exists(public_path($fName)) )
            {
                $this->consentFormLink = $fName;
            }


        }
    }

}
