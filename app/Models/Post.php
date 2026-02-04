<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Container\Attributes\Auth;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{

    use HasFactory, Searchable;

    protected $fillable = [
        'title',
        'content',
        'user_id',
    ];

    public function toSearchableArray()
    {
        $array = [
           'title' => $this->title,
           'content' => $this->content
        ];

        return $array;
    }

    public function user()
    {
        return $this->BelongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes');
    }

    public function likedBy()
    {
        return $this->likes()->where('user_id', auth()->id())->exists();
    }
}
