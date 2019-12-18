<?php

namespace Stream;

use Stream\Channel;



class Subscription extends Model
{
    public function channel(){

        return $this->belongsTo(Channel::class);
    }
}
