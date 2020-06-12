<?php

namespace Stream\Http\Controllers;

use Illuminate\Http\Request;
use Stream\Video;

class VideoController extends Controller
{
    public function show(Request $request, Video $video)
    {
        if ($request->wantsJson()) {
            return $video;
        } else {
            return view('video', compact('video'));
        }
    }
}
