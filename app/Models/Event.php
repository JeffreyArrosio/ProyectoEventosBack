<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date_start',
        'date_end',
        'title',
        'description',
        'main_image',
        'access_type',
        'main_image',
        'type_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'date_start' => 'datetime',
        'date_end' => 'datetime',
        'type_id' => 'integer',
    ];

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function type()
    {
        return $this->morphOne(Type::class, 'typeable');
    }

    public function images()
    {
        return $this->morphMany(Comment::class, 'imageable');
    }

    public function associations(): BelongsToMany
    {
        return $this->belongsToMany(Association::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
