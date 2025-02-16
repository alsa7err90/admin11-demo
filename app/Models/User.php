<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Traits\ImagesableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens, HasRoles, ImagesableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'referral_code',
        'referred_by',
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Generate a unique referral code for the user.
     *
     * @return string
     */
    public static function generateReferralCode()
    {
        // Generate a unique referral code (e.g., ABCD-1234567-XYZ123)
        do {
            $code = strtoupper(Str::random(4)) . '-' . random_int(1000000, 9999999) . '-' . strtoupper(Str::random(6));
        } while (self::where('referral_code', $code)->exists()); // Ensure it's unique

        return $code;
    }

    /**
     * The "boot" method of the model, used to define model events.
     */
    protected static function boot()
    {
        parent::boot();

        // Automatically generate referral code on user creation
        static::creating(function ($user) {
            // Generate referral code for the new user
            $user->referral_code = self::generateReferralCode();
        });
    }

    /**
     * Get the user who referred this user.
     */
    public function referrer()
    {
        return $this->belongsTo(User::class, 'referred_by');
    }

    /**
     * Get the users who were referred by this user.
     */
    public function referredUsers()
    {
        return $this->hasMany(User::class, 'referred_by');
    }
}
