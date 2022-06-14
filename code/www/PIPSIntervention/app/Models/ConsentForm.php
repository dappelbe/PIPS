<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * App\Models\ConsentForm
 *
 * @mixin Eloquent
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $pis
 * @property int $voluntary
 * @property int $data
 * @property int $agree
 * @property string $name
 * @property string $consentdate
 * @property string $ppt_signature
 * @property string $takenby
 * @property string $checkdate
 * @property string $research_sig
 * @method static \Illuminate\Database\Eloquent\Builder|ConsentForm newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ConsentForm newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ConsentForm query()
 * @method static \Illuminate\Database\Eloquent\Builder|ConsentForm whereAgree($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConsentForm whereCheckdate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConsentForm whereConsentdate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConsentForm whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConsentForm whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConsentForm whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConsentForm whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConsentForm wherePis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConsentForm wherePptSignature($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConsentForm whereResearchSig($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConsentForm whereTakenby($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConsentForm whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConsentForm whereVoluntary($value)
 */
class ConsentForm extends Model
{
    use HasFactory;
    protected $table = 'consentform';
    protected $fillable = array('pis', 'voluntary', 'data', 'agree', 'name', 'consentdate', 'ppt_signature');

    /***
     * Get a list of all data in the table
     * @return mixed[]
     */
   public static function List() : array {
       return DB::table('consentform')->get()->toArray();
   }

}
