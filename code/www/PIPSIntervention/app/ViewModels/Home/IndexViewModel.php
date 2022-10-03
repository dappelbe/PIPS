<?php

namespace App\ViewModels\Home;

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
        }
    }

}
