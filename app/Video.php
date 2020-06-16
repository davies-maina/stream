<?php

namespace Stream;

use Stream\Channel;


class Video extends Model
{
    public function channel()
    {

        return $this->belongsTo(Channel::class);
    }

    public function canedit()
    {

        return auth()->check() && $this->channel->user_id === auth()->user()->id;
    }

    public function votes()
    {

        return $this->morphMany(Vote::class, 'voteable');
    }
}
