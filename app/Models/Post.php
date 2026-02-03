<?php

namespace App\Models;

use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Scout\Searchable;

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

    public function User()
    {
        return $this->BelongsTo(User::class);
    }

    public function Comments()
    {
        return $this->hasMany(Comment::class);
    }
}
