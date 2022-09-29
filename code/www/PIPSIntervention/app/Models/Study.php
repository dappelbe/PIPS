<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;

/**
 * App\Models\Study
 *
 * @mixin Eloquent
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
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
 * @method static Builder|Study newModelQuery()
 * @method static Builder|Study newQuery()
 * @method static Builder|Study query()
 * @method static Builder|Study whereAllocationfield($value)
 * @method static Builder|Study whereApikey($value)
 * @method static Builder|Study whereApiurl($value)
 * @method static Builder|Study whereCreatedAt($value)
 * @method static Builder|Study whereExpectedrecruits($value)
 * @method static Builder|Study whereId($value)
 * @method static Builder|Study whereRandodatefield($value)
 * @method static Builder|Study whereRandonumfield($value)
 * @method static Builder|Study whereSitenamefield($value)
 * @method static Builder|Study whereStudyaccruallink($value)
 * @method static Builder|Study whereStudyaddress($value)
 * @method static Builder|Study whereStudyemail($value)
 * @method static Builder|Study whereStudylogo($value)
 * @method static Builder|Study whereStudyname($value)
 * @method static Builder|Study whereStudyphone($value)
 * @method static Builder|Study whereStudyrandomisationreportid($value)
 * @method static Builder|Study whereStudystatusreportid($value)
 * @method static Builder|Study whereUpdatedAt($value)
 * @method static Builder|Study whereUploadedpis($value)
 */
class Study extends Model
{
    use HasFactory;
    protected $table = 'studydetails';
    protected $fillable = array('studyname', 'apiurl', 'apikey', 'studylogo',
        'studyemail', 'studyphone', 'uploadedpis', 'studyrandomisationreportid',
        'randonumfield', 'allocationfield', 'studystatusreportid', 'studyaddress',
        'sitenamefield', 'studyaccruallink', 'expectedrecruits', 'randodatefield', 'potentialrecruitsreport'
        );

    /***
     * Function to format the list of PIS for a given study as an HTML list.
     *
     * @param string $publicFolderName => the name of the public folder containing the PIS files.
     * @return string
     */
    public function getPISFilesAsHTMLList(string $publicFolderName) {
        $retVal = "<ul>";
        if (!empty($this->uploadedpis)) {
            $files = explode('|', $this->uploadedpis);
            foreach ($files as $file) {
                $newFile = trim($file);
                if (strlen($newFile) > 0) {
                    $retVal .= sprintf("<li><a href=\"%s/%s\" target=\"_blank\">%s</a></li>", $publicFolderName, $newFile, $newFile);
                }
            }
        }
        $retVal .= "</ul>";
        return $retVal;
    }

}
