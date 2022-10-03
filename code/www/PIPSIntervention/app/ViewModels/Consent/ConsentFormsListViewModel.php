<?php

use App\Utilities\IRetrieveREDCapData;
use App\Models\Study;
use App\Models\Ignore;
use App\Models\ConsentForm;

class ConsentFormsListViewModel
{
    private string $yes = "Yes";
    private string $no = "No";
    public string $pageTitle = "PIPs: Participants to contact / consented";
    public array $viewData;
    public IRetrieveREDCapData $redcapProject;

    public function __construct( IRetrieveREDCapData $rcData)
    {
        $this->redcapProject = $rcData;
        $this->viewData = array();
    }

    public function handle() : void {
        $studies = Study::all();
        $participants2Ignore = Ignore::all();
        $consentForms = ConsentForm::all();
        foreach ($studies as $study)
        {
            //-- Get participants from RC
            $this->redcapProject->openProject($study->apiurl, $study->apikey);
            $people2contact = $this->redcapProject->exportReportsAsArrayWithLabels($study->potentialrecruitsreport);
            //-- now remove those that we have discounted
            foreach ($people2contact as $people ) {
                foreach ($participants2Ignore as $ignoreMe) {
                    if ($ignoreMe->study_id == $study->id) {
                    }
                }
            }
        }

    }

}
