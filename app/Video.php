<?php

namespace Stream;

use Stream\Channel;


class Video extends Model
{
    public function channel(){

        return $this->belongsTo(Channel::class);
    }
}
