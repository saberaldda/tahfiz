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

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
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
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getFullPhotoPathAttribute()
    {
        if (!$this->photo) {
            return asset('https://via.placeholder.com/400x400.png/89edff?text=Placeholder');
        }
        if (stripos($this->photo, 'http') === 0) {
            return $this->photo;
        }
        return asset(url('storage/'). '/' . $this->photo);
    }

    public function points()
    {
        return $this->hasMany(Point::class);
    }
}
