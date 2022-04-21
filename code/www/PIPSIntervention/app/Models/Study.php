<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Study extends Model
{
    use HasFactory;
    protected $table = 'studydetails';
    protected $fillable = array('studyname', 'apiurl', 'apikey', 'studylogo',
        'studyemail', 'studyphone', 'uploadedpis', 'studyrandomisationreportid',
        'randonumfield', 'allocationfield', 'studystatusreportid'
        );
}
