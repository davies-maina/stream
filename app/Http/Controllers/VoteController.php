<?php

namespace Stream\Http\Controllers;

use Stream\Video;

use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function vote(Video $video, $type)
    {
        return auth()->user()->toggleVote($video, $type);
    }
}
