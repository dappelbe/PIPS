<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

/**
 * App\Models\ConsentForm
 *
 * @mixin Eloquent
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
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
 * @method static Builder|ConsentForm newModelQuery()
 * @method static Builder|ConsentForm newQuery()
 * @method static Builder|ConsentForm query()
 * @method static Builder|ConsentForm whereAgree($value)
 * @method static Builder|ConsentForm whereCheckdate($value)
 * @method static Builder|ConsentForm whereConsentdate($value)
 * @method static Builder|ConsentForm whereCreatedAt($value)
 * @method static Builder|ConsentForm whereData($value)
 * @method static Builder|ConsentForm whereId($value)
 * @method static Builder|ConsentForm whereName($value)
 * @method static Builder|ConsentForm wherePis($value)
 * @method static Builder|ConsentForm wherePptSignature($value)
 * @method static Builder|ConsentForm whereResearchSig($value)
 * @method static Builder|ConsentForm whereTakenby($value)
 * @method static Builder|ConsentForm whereUpdatedAt($value)
 * @method static Builder|ConsentForm whereVoluntary($value)
 */
class ConsentForm extends Model
{
    use HasFactory;
    protected $table = 'consentform';
    protected $fillable = array('pis', 'voluntary', 'data', 'agree', 'name', 'consentdate',
        'ppt_signature', 'study_id','record_id');

    /***
     * Get a list of all data in the table
     * @return array
     */
   public static function List() : array {
       return DB::table('consentform')->get()->toArray();
   }

}
