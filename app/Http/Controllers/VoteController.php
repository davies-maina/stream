<?php

namespace Stream\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Stream\Video;
use Stream\Comment;

use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function vote($entityId, $type)
    {
        $entity = $this->getEntity($entityId);
        return auth()->user()->toggleVote($entity, $type);
    }


    public function getEntity($entityId)
    {
        $video = Video::find($entityId);
        if ($video) return $video;
        # code...

        $comment = Comment::find($entityId);
        if ($comment) return $comment;

        throw new ModelNotFoundException("entity not found");
    }
}
