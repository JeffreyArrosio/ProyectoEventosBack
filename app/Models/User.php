<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
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
        'email',
        'password',
        'google_id',
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

    public function associations(){
        return $this->belongsToMany(Association::class);
    }

    public function myAssociations(){
        return $this->hasMany(Association::class, 'user_id');
    }
    public function events(){
        return $this->belongsToMany(Event::class, 'event_user');
    }
    
    public function myEvents()  {
        return $this->hasManyThrough(Event::class, Association::class, 'user_id', 'id', 'id', 'id')
            ->join('association_event', 'events.id', '=', 'association_event.event_id')
            ->select('events.*');
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
