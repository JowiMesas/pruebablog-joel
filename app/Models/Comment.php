<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Comment extends Model
{
    protected $fillable = [
        "content",
        "user_id",
     ];
    public function commentable() : MorphTo {
        return $this->morphTo();
    }
    public function replies() : MorphMany {
        return $this->morphMany(Comment::class,"commentable");
    }
    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }
}
