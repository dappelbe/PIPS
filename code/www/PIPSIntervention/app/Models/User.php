<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Database\Eloquent\Collection;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Laravel\Sanctum\PersonalAccessToken;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Builder;

/**
 * App\Models\User
 *
 * @mixin Eloquent
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $last_login_at
 * @property string|null $last_login_ip
 * @property string|null $randomisation_number
 * @property int|null $studyid
 * @property-read DatabaseNotificationCollection|DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read Collection|Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read Collection|Role[] $roles
 * @property-read int|null $roles_count
 * @property-read Collection|PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static UserFactory factory(...$parameters)
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User permission($permissions)
 * @method static Builder|User query()
 * @method static Builder|User role($roles, $guard = null)
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereEmailVerifiedAt($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereLastLoginAt($value)
 * @method static Builder|User whereLastLoginIp($value)
 * @method static Builder|User whereName($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User whereRandomisationNumber($value)
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereStudyid($value)
 * @method static Builder|User whereUpdatedAt($value)
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'last_login_at',
        'last_login_ip',
        'randomisation_number',
        'studyid',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /***
     * Function to get and format the date & time that a user last logged in to the system
     *
     * @param User $user => The user Object
     * @return string => Never if the user has never logged in, else in the format day of the week day of the month,
     * Month of the year, year and time i.e. Wednesday 15 June 2022 at 18:50
     */
    public static function getUsersLastLoginAndFormat(User $user) : string {
        if ( is_null($user->last_login_at )  || strlen(trim($user->last_login_at)) == 0 ) {
            return 'Never';
        } else {
            return date('l d F Y', strtotime($user->last_login_at))
                . ' at '
                . date('H:i', strtotime($user->last_login_at));

        }

    }

}
