<?php

namespace Stream\Http\Controllers;

use Stream\Video;
use Stream\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Video $video)
    {

        /* $comments = $video->comments()->paginate(5);

        return response()->json($comments); */

        /* $comments = json_decode(json_encode($video->comments()->paginate(5)), true);
        return response()->json($comments); */

        return $video->comments()->paginate(5);
    }

    public function show(Comment $comment)
    {

        return $comment->replies()->paginate(5);
    }
}
