<?php

namespace Stream;

use Stream\User;


class Channel extends Model
{
    public function user(){

        return $this->belongsTo(User::class);
    }
}
