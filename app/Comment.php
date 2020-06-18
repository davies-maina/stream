<?php

namespace Stream;

use Stream\User;
use Stream\Video;




class Comment extends Model
{

    protected $with = ['user']; //eager load user who created comment
    protected $appends = ['repliesCount']; //laravel computed properties
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

        return $this->hasMany(Comment::class, 'comment_id')->whereNotNull('comment_id');
    }

    public function getRepliesCountAttribute()
    {

        return $this->replies()->count();
    }
}
