<?php

namespace App\Utilities;

interface IRetrieveREDCapData
{
    public function exportReportsAsArrayWithLabels(string $reportId) : array;
    public function openProject(string $url, string $key) : void;
}
