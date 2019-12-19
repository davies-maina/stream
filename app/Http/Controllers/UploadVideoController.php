<?php

namespace Stream\Http\Controllers;

use Stream\Channel;
use Illuminate\Http\Request;

class UploadVideoController extends Controller
{
    public function index(Channel $channel){

        return view('channels.upload', [
            'channel'=>$channel

        ]);
    }
}
