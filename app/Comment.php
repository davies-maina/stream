<?php

namespace Stream;

use Stream\User;
use Stream\Video;
use Stream\Comment;



class Comment extends Model
{
    public function video()
    {

        return $this->belongsTo(Video::class);
    }

    public function user()
    {

        return $this->belongsTo(User::class);
    }

    public function replies()
    {

        return $this->hasMany(Comment::Class, 'comment_id')->whereNotNull('comment_id');
    }
}
