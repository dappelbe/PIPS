<?php

namespace ViewModels\Home;

use App\Models\Study;
use App\Models\User;
use App\Utilities\IRetrieveREDCapData;
use App\Utilities\RetrieveREDCapData;
use App\ViewModels\Home\IndexViewModel;
use Database\Seeders\TestDatabaseSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Mockery;
use Tests\TestCase;

class IndexViewModelTest extends TestCase
{
    use DatabaseMigrations;
    use RefreshDatabase;

    private User $user;
    private IRetrieveREDCapData $rcData;

    protected function setUp(): void
    {
        parent::setUp();
        $user = User::factory()->create();
        Auth::setUser($user);
        $this->seed(TestDatabaseSeeder::class);
        $this->rcData = Mockery::mock(RetrieveREDCapData::class);
        $this->rcData->allows('openProject');
        $this->rcData->allows('exportReportsAsArrayWithLabels')
            ->andReturns([[
                'record_id' => "2",
                'redcap_event_name' => "Baseline",
                'redcap_repeat_instrument' => "",
                'redcap_repeat_instance' => "",
                'redcap_data_access_group' => "Airedale General Hospital AGH - 2",
                'ra_screeningnum' => "7",
                'ra_date' => "2020-09-15",
                'ra_inclusionyn' => "<u>Yes</u>",
                'ra_exclusionyn' => "<u>No</u>",
                'ra_cte_id' => "Royal Aberdeen Children's Hospital RAC",
                'ra_frac_type' => "Completely off-ended",
                'ra_frac_loc' => "Metaphyseal only",
                'ra_age_eli' => "0",
                'ra_age_group' => "6",
                'ra_consentyn' => "Yes",
                'ra_consentdate' => "2020-03-23",
                'ra_randomisedby' => "John Smith",
                'ra_subj_id' => "CR-RAC-10035",
                'ra_treat_alloc' => "Non-surgical casting",
                'bt_rcvdtreatment' => ""
            ]]);
    }

    public function testPropertiesHaveDefaultValuesWhenInstantiated() {
        $notSet = 'Not set';
        $myView = new IndexViewModel($this->rcData);
        $this->assertEquals($notSet, $myView->allocation);
        $this->assertEquals(2, $myView->id);
        $this->assertEquals('Never', $myView->lastLogin);
        $this->assertEquals($notSet, $myView->randoNum);
        $this->assertEquals($notSet, $myView->recruitNumber);
        $this->assertEquals($notSet, $myView->siteName);
        $this->assertEquals($notSet, $myView->studyEmail);
        $this->assertEquals($notSet, $myView->studyName);
        $this->assertNotNull($myView->user);
    }

    public function testHandlesLackOfStudyGracefullyIeParametersSetToDefault() {
        //-- This should never happen, but just in case
        $user = User::factory()->create(['studyid' => null]);
        Auth::setUser($user);
        $notSet = 'Not set';
        $myView = new IndexViewModel($this->rcData);
        $myView->handle();

        $this->assertEquals($notSet, $myView->allocation);
        $this->assertEquals($user->id, $myView->id);
        $this->assertEquals('Never', $myView->lastLogin);
        $this->assertEquals($notSet, $myView->randoNum);
        $this->assertEquals($notSet, $myView->recruitNumber);
        $this->assertEquals($notSet, $myView->siteName);
        $this->assertEquals($notSet, $myView->studyEmail);
        $this->assertEquals($notSet, $myView->studyName);
        $this->assertNotNull($myView->user);
    }

    public function testExtractsStudyDetailsCorrectly() {
        $notSet = 'Not set';
        $myView = new IndexViewModel($this->rcData);
        $myView->handle();
        $this->assertEquals($notSet, $myView->allocation);
        $this->assertEquals(2, $myView->id);
        $this->assertEquals('Never', $myView->lastLogin);
        $this->assertEquals('CR-AAA-10001', $myView->randoNum);
        $this->assertEquals('1<sup>st</sup>', $myView->recruitNumber);
        $this->assertEquals($notSet, $myView->siteName);
        $this->assertEquals('study email', $myView->studyEmail);
        $this->assertEquals('MyStudy', $myView->studyName);
        $this->assertNotNull($myView->user);
    }

}
