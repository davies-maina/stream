<?php

namespace Stream\Http\Controllers;

use Stream\Channel;
use Illuminate\Http\Request;
use Stream\Jobs\Videos\ConvertForStreaming;

class UploadVideoController extends Controller
{
    public function index(Channel $channel){

        return view('channels.upload', [
            'channel'=>$channel

        ]);
    }

    public function store(Channel $channel, Request $request){

        $video = $channel->videos()->create([

            'title' => $request->title,
            'path' => $request->video->store("channels/{$channel->id}"),


        ]);

        $this->dispatch(new ConvertForStreaming($video));

        return $video;
    }
}
