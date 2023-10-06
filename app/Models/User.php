<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const TYPES = ['student', 'teacher', 'admin'];

    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getFullPhotoPathAttribute()
    {
        if (!$this->photo) {
            return asset('assets/admin/img/favicon/omar.png');
        }
        if (stripos($this->photo, 'http') === 0) {
            return $this->photo;
        }
        return asset('storage/'. '/' . $this->photo);
    }

    public function points()
    {
        return $this->hasMany(Point::class);
    }
}
