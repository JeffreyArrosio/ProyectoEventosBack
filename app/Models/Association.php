<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Association extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'max_member',
        'telephone',
        'email',
        'main_image',
        'user_id',
        'type_id',
        'main_image',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'type_id' => 'integer',
    ];

    public function events(): BelongsToMany
    {
        return $this->belongsToMany(Event::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function type(){
        return $this->morphOne(Type::class,'typeable');
    }
    
    public function comments()
    {
        return $this->morphMany(Comment::class,'commentable');
    }

    public function images(){
        return $this->morphMany(Comment::class,'imageable');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
