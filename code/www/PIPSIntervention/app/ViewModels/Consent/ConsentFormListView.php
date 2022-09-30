<?php

class ConsentFormListView
{
    public string $lastUpdated;
    public string $recordId;
    public string $dateOfConsent;
    public string $name;
    public string $pis;
    public string $voluntary;
    public string $data;
    public string $agree;
    public string $consentedBy;

    private string $notSet = "Not set";

    public function __construct()
    {
        $this->lastUpdated = $this->notSet;
        $this->recordId = $this->notSet;
        $this->dateOfConsent = $this->notSet;
        $this->name = $this->notSet;
        $this->pis = $this->notSet;
        $this->voluntary = $this->notSet;
        $this->data = $this->notSet;
        $this->agree = $this->notSet;
        $this->consentedBy = $this->notSet;

    }
}
