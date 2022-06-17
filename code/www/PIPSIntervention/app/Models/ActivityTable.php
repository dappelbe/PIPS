<?php

namespace App\Models;

use Eloquent;
use App\Models\Enums\ActivityTableEnums;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Builder;
use Throwable;

/**
 * App\Models\ActivityTable
 *
 * @method static Builder|ActivityTable newModelQuery()
 * @method static Builder|ActivityTable newQuery()
 * @method static Builder|ActivityTable query()
 * @mixin Eloquent
 * @property int|mixed|string|null $user_id
 * @property mixed|string $activity
 * @property mixed|string $comments
 * @property mixed|string $created_at
 * @property mixed|string $updated_at
 */
class ActivityTable extends Model
{
    use HasFactory;

    protected $table = 'activity';

    /***
     * Function to store the users' activity to the database
     * @param string $pageName
     * @param string $comment
     * @return ActivityTableEnums
     */
    public static function StoreMyActivity(string $pageName, string $comment) :  ActivityTableEnums {
        if (strlen(trim($pageName)) === 0 ) {
            Log::error( 'Function StoreMyActivity called with an empty page name' );
            return ActivityTableEnums::EmptyPageName;
        } else {
            if ( strlen(trim($comment)) === 0 ) {
                Log::error( 'Function StoreMyActivity called with an empty comment');
                return ActivityTableEnums::EmptyComment;
            } else {
                $row = new ActivityTable();
                $row->user_id = Auth::id();
                $row->activity = trim($pageName);
                $row->comments = trim($comment);
                $row->created_at = date("Y-m-d H:i:s");
                $row->updated_at = date("Y-m-d H:i:s");
                $retVal = ActivityTableEnums::AllOK;
                try {
                    $row->saveOrFail();
                } catch (Throwable $e) {
                    Log::error('Problem saving activity -> ' . Auth::id() . ' page: ' . $pageName . PHP_EOL . $e->getMessage());
                    $retVal = ActivityTableEnums::DidNotSave;
                }
                return $retVal;
            }
        }
    }

}
