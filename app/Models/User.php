<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;



class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
        'phone_number',
        'codeLogin',
        'specialisation',
        'address',
        'city',
        'isClient',
        'isAdmin',
        'isMechanic',
        // Include other new fields as needed
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

    /**
     * Accessor method to retrieve address based on user type.
     *
     * @return string|null
     */
    public function getAddressAttribute()
    {
        if ($this->isClient) {
            return $this->attributes['address'];
        }
        return null;
    }

    /**
     * Accessor method to retrieve city based on user type.
     *
     * @return string|null
     */
    public function getCityAttribute()
    {
        if ($this->isClient) {
            return $this->attributes['city'];
        }
        return null;
    }
}
