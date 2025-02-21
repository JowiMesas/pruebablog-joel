<?php

namespace App\Models;

use Carbon\Carbon;
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
     
    public function getCreatedDateFormat() { 
        return Carbon::parse($this->created_at)->locale('en')->toDayDateTimeString();

    }
    public function commentable() : MorphTo {
        return $this->morphTo();
    }
    public function replies() : MorphMany {
        return $this->morphMany(Comment::class,"commentable");
    }
    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }
    protected static function booted()
{
    static::deleting(function ($comment) {
        // Elimina las respuestas asociadas a este comentario
        $comment->replies()->delete();
    });
}
}
