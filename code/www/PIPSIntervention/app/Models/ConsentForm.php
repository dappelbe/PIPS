<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsentForm extends Model
{
    use HasFactory;
    protected $table = 'consentform';
    protected $fillable = array('pis', 'voluntary', 'data', 'agree', 'name', 'consentdate', 'ppt_signature');

}
