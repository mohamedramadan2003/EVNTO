<?php

namespace App\Models\User;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Event\Event;
use App\Models\Event\EventComment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'email', 'password', 'provider', 'provider_id', 'provider_token',
    ];

    public function profile()
    {
        return $this->hasOne(UserProfile::class);
    }

    public function skills()
    {
        return $this->hasMany(UserSkill::class);
    }

    public function interests()
    {
        return $this->hasMany(UserInterest::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function favouriteEvents()
    {
        return $this->belongsToMany(Event::class, 'favourite_events');
    }

    public function comments()
    {
        return $this->hasMany(EventComment::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
