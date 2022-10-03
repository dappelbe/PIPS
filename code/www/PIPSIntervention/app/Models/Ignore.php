<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
 * App\Models\Ignore
 *
 * @mixin Eloquent
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $study_id
 * @property int|null $record_id
 */
class Ignore extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'study_id',
        'record_id',
        'last_login_at',
        'last_login_ip',
    ];

}
