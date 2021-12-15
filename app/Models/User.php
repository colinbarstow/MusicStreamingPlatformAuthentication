<?php

namespace App\Models;

use App\Contracts\MustSetPassword;
use App\Contracts\MustVerifyMobileNumber;
use App\Traits\Mutators\UserMutation;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\MustVerifyMobileNumber as MobileNumber;
use App\Traits\Auth\MustSetPassword as Password;
use Laravel\Sanctum\PersonalAccessToken;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $mobile_number
 * @property string $password_secret
 * @property Carbon|null $email_verified_at
 * @property Carbon|null $mobile_number_verified_at
 * @property Carbon|null $password_set_at
 * @property string|null $password
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read UserProfile|null $profile
 * @property-read Collection|PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User query()
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereEmailVerifiedAt($value)
 * @method static Builder|User whereFirstName($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereLastName($value)
 * @method static Builder|User whereMobileNumber($value)
 * @method static Builder|User whereMobileNumberVerifiedAt($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereTwoFactorRecoveryCodes($value)
 * @method static Builder|User whereTwoFactorSecret($value)
 * @method static Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable implements MustVerifyEmail, MustVerifyMobileNumber, MustSetPassword
{
    use HasApiTokens, HasFactory, Notifiable, UserMutation, MobileNumber, Password;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'mobile_number',
        'password',
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
        'email_verified_at'         => 'datetime',
        'mobile_number_verified_at' => 'datetime',
        'password_set_at'           => 'datetime'
    ];

    /**
     * Get a completion redirect path for a specific feature.
     *
     * @param string $redirect
     * @param null $default
     * @return string
     */
    public static function redirects(string $redirect, $default = null): string
    {
        return config('auth.redirects.'.$redirect) ?? $default ?? config('fortify.home');
    }

    /**
     * @return HasOne
     */
    public function profile(): HasOne
    {
        return $this->hasOne(UserProfile::class);
    }

    /**
     * Scope a query to retrieve user for password secret.
     *
     * @param Builder $query
     * @param $passwordSecret
     * @return void
     */
    public function scopePasswordSecret(Builder $query, $passwordSecret)
    {
        $query->where('password_secret', $passwordSecret);
    }

}
