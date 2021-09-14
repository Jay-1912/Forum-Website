<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopicReplies extends Model
{
    use HasFactory;

    public function topic()
    {
        return $this->belongsTo('App\Models\Topic');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function replyLikes()
    {
        return $this->hasMany('App\Models\ReplyLike');
    }

    public function replyDislikes()
    {
        return $this->hasMany('App\Models\ReplyDislike');
    }
}
