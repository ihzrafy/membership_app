<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'provider',
        'provider_id',
        'membership_type',
        'avatar',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Membership types
    const MEMBERSHIP_A = 'A';
    const MEMBERSHIP_B = 'B'; 
    const MEMBERSHIP_C = 'C';

    public function getMembershipLimits()
    {
        return match($this->membership_type) {
            self::MEMBERSHIP_A => ['articles' => 3, 'videos' => 3],
            self::MEMBERSHIP_B => ['articles' => 10, 'videos' => 10],
            self::MEMBERSHIP_C => ['articles' => PHP_INT_MAX, 'videos' => PHP_INT_MAX],
            default => ['articles' => 0, 'videos' => 0]
        };
    }

    public function canAccessContent($type, $count)
    {
        $limits = $this->getMembershipLimits();
        return $limits[$type] === null || $count <= $limits[$type];
    }
}
