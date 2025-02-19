<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Post extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image_url',
        'user_id',
    ];
    public function getCreatedDateFormat() {
        return Carbon::parse($this->created_at)->locale('en')->diffForHumans();
    }
    public function getUpdatedDateFormat() {
        return Carbon::parse($this->updated_at)->locale('en')->diffForHumans();
    }
    public function user() :BelongsTo {
        return $this->belongsTo(User::class);
    }
    public function categories() : BelongsToMany {
        return $this->belongsToMany(Category::class);
    }
    public function comments() : MorphMany {
        return $this->morphMany(Comment::class,'commentable');
    }
}
