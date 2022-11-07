<?php

namespace App\Jobs;

use App\Models\Study;
use App\Models\User;
use App\Utilities\Util;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use IU\PHPCap\PhpCapException;
use IU\PHPCap\RedCapProject;

class DownloadREDCapConsentForm implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected User $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = User::find($user->id);
    }

    /**
     * Execute the job.
     *
     * @return void
     * @throws PhpCapException
     */
    public function handle() : void
    {
        if (is_null($this->user) ) {
            return;
        }
        if (is_null($this->user->studyid)) {
            return;
        }
        $study = Study::find($this->user->studyid);
        if (!isset($study)) {
            return;
        }
        $rc = new RedCapProject($study->apiurl, $study->apikey);
        $records = $rc->exportReports($study->studyrandomisationreportid, 'php', 'label');
        $myRandoRec = array();
        if ( !isset($records) ) {
            return;
        }
        $myRandoRec = Util::filterArrayByValue($records, $study->randonumfield, $this->user->randomisation_number);
        if (count($myRandoRec) == 0) {
            return;
        }
        $recordID = $myRandoRec[0]['record_id'];
        $dPath = public_path('redcap_forms/');
        if ( !\File::exists($dPath) ) {
            \File::makeDirectory($dPath, 0777, true, true);
        }
        $savePath = public_path('redcap_forms/' . $this->NewGuid() . '.pdf');
        $rc->exportPdfFileOfInstruments($savePath, $recordID,
                $study->consent_visit, $study->consent_instrument);
        $this->user->redcap_consent_form = substr(str_replace(public_path(''), '', $savePath),1);
        $this->user->save();
    }

    function NewGuid() : string {
        $s = strtoupper(md5(uniqid(rand(),true)));
        $guidText =
            substr($s,0,8) . '-' .
            substr($s,8,4) . '-' .
            substr($s,12,4). '-' .
            substr($s,16,4). '-' .
            substr($s,20);
        return $guidText;
    }
}
