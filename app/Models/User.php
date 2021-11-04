<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Concerns\HasHandle;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasHandle;
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * @var string[]
     */
    protected $fillable = [
        'handle',
        'name',
        'email',
        'password',
        'verified',
    ];

    /**
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'verified' => 'boolean',
    ];

    /**
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function articles(): HasMany
    {
        return $this->hasMany(
            related: Article::class,
            foreignKey: 'user_id',
        );
    }

    public function generateHandle(): string
    {
        return Str::slug(
            title: $this->name,
        );
    }
}
