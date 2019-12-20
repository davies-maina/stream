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

    public function store(Channel $channel, Request $request){

        return $channel->videos()->create([

            'title'=>$request->title,
            'path'=>$request->video->store("channels/{$channel->id}"),
            

        ]);
    }
}
