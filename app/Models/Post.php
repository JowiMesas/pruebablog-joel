<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Post extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image_url',
    ];
    public function getCreatedDateFormat() {
        return Carbon::parse($this->created_at)->locale('en')->diffForHumans();
    }
    public function getUpdatedDateFormat() {
        return Carbon::parse($this->updated_at)->locale('en')->diffForHumans();
    }
}
