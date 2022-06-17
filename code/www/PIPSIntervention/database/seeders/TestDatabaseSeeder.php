<?php

namespace Database\Seeders;

use App\Models\Study;
use Illuminate\Database\Seeder;

class TestDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $row = new Study();
        $row->id = 1;
        $row->created_at = date("Y-m-d H:i:s");
        $row->updated_at = date("Y-m-d H:i:s");
        $row->studyname = 'MyStudy';
        $row->apiurl = 'https://rc.org/api';
        $row->apikey = 'keykeykeykeykeykeykeykey';
        $row->studyrandomisationreportid = '1';
        $row->studyemail = 'study email';
        $row->studylogo = 'mylogo.png';
        $row->studyphone = '01865 123 123';
        $row->studyaddress = 'my address';
        $row->uploadedpis = 1;
        $row->randonumfield = 'ra_subj_id';
        $row->randodatefield = 'date field';
        $row->allocationfield = 'ra_treat_alloc';
        $row->sitenamefield = 'ra_cte_id';
        $row->studystatusreportid = '2';
        $row->studyaccruallink = 'study accrual link';
        $row->expectedrecruits = '99';
        $row->save();

    }
}
