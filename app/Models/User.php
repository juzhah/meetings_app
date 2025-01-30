<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'lastname',
        'email',
        'password',
        'profile_picture',
        'biography',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];



    /**
     * Get all user created meetings. 
     * If no meetings created, returns null
     *
     * @return  Meeting<Meeting, null>
     */
    protected function organizedMeetings(): HasMany
    {
        return $this->hasMany(Meeting::class);
    }

    /**
     * Get all user created meetings. 
     * If no meetings created, returns null
     *
     * @return  Meeting<Meeting, null>
     */
    protected function attendedMeetings(): BelongsToMany
    {
        return $this->belongsToMany(Meeting::class, 'user_meeting');
    }

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
}
