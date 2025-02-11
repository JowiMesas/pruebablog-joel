<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
}
