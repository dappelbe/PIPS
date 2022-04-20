<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ConsentForm extends Model
{
    use HasFactory;
    protected $table = 'consentform';
    protected $fillable = array('pis', 'voluntary', 'data', 'agree', 'name', 'consentdate', 'ppt_signature');

    /***
     * Get a list of all data in the table
     * @return mixed[]
     */
   public static function List() {
       return DB::table('consentform')->get()->toArray();
   }

}
