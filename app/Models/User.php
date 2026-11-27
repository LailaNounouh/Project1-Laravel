<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

// Security fix: users must verify their e-mail address (also after changing it).
class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * De velden die massaal ingevuld kunnen worden.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        // Security fix: 'is_admin' removed from $fillable to prevent mass-assignment
        // privilege escalation. It is now only set explicitly via forceFill() by admins.
        'bio',
        'profile_photo',
        'birthday',
    ];

    /**
     * Velden die verborgen blijven bij serialisatie.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Type casting van kolommen.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'string',
        'is_admin' => 'boolean',
        'birthday' => 'date',
    ];

    public function news()
    {
        return $this->hasMany(News::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function categories()
    {
        return $this->belongsToMany(\App\Models\Category::class)
            ->withTimestamps();
    }
}
