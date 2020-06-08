<?php

namespace Stream\Http\Controllers;

use Illuminate\Http\Request;
use Stream\Video;

class VideoController extends Controller
{
    public function show(Video $video)
    {
        return $video;
    }
}
