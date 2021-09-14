<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReplyDislike extends Model
{
    use HasFactory;

    public function topicreply()
    {
        return $this->belongsTo('App\Models\TopicReplies');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
