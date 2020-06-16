<?php

namespace Stream;



class vote extends Model
{

    protected $guarded = [];
    public function voteable()
    {

        return $this->morphTo();
    }
}
