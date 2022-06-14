<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Study
 *
 * @mixin Eloquent
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $studyname
 * @property string $apiurl
 * @property string $apikey
 * @property string $studylogo
 * @property string $studyemail
 * @property string $studyphone
 * @property string $studyaddress
 * @property int $uploadedpis
 * @property int $studyrandomisationreportid
 * @property string $randonumfield
 * @property string $allocationfield
 * @property string $sitenamefield
 * @property int $studystatusreportid
 * @property string|null $studyaccruallink
 * @property int|null $expectedrecruits
 * @property string|null $randodatefield
 * @method static \Illuminate\Database\Eloquent\Builder|Study newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Study newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Study query()
 * @method static \Illuminate\Database\Eloquent\Builder|Study whereAllocationfield($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Study whereApikey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Study whereApiurl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Study whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Study whereExpectedrecruits($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Study whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Study whereRandodatefield($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Study whereRandonumfield($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Study whereSitenamefield($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Study whereStudyaccruallink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Study whereStudyaddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Study whereStudyemail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Study whereStudylogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Study whereStudyname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Study whereStudyphone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Study whereStudyrandomisationreportid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Study whereStudystatusreportid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Study whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Study whereUploadedpis($value)
 */
class Study extends Model
{
    use HasFactory;
    protected $table = 'studydetails';
    protected $fillable = array('studyname', 'apiurl', 'apikey', 'studylogo',
        'studyemail', 'studyphone', 'uploadedpis', 'studyrandomisationreportid',
        'randonumfield', 'allocationfield', 'studystatusreportid', 'studyaddress',
        'sitenamefield', 'studyaccruallink', 'expectedrecruits', 'randodatefield'
        );
}
