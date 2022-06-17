<?php

namespace App\Utilities;

use IU\PHPCap\PhpCapException;
use IU\PHPCap\RedCapProject;
use Log;

class RetrieveREDCapData implements IRetrieveREDCapData
{
    private RedCapProject $project;

    /***
     * Function to instantiate the RedCapProject object that is needed to extract data from REDCap.
     *
     * @param string $url => REDCap URL to connect to.
     * @param string $key => REDCap key to authenticate with
     * @return void
     */
    public function openProject(string $url, string $key) : void {
        try {
            $this->project = new RedCapProject($url, $key);
        } catch (PhpCapException $e) {
            Log::error('Could not connect to REDCap', $e);
        }
    }

    /***
     * Function that acts as a wrapper to the exportReportsAsArrayWithLabels call from RedCapProject.
     *
     * @param string $reportId => The REDCap report Id that we wish to extract data from.
     * @return array
     */
    public function exportReportsAsArrayWithLabels(string $reportId): array
    {
        if ( isset($this->project) ) {
            return $this->project->exportReports($reportId, 'php', 'label');
        } else {
            return array();
        }
    }
}
