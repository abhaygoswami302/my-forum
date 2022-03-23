<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Reply;
use Illuminate\Support\Facades\Auth;

class ReplyController extends Controller
{
    public function store($id, Request $request)
    {
        $question_id = Question::where('id', '=', $id)->first();

        $reply = new Reply();

        $reply->question_id = $id;
        $reply->user_id = Auth::user()->id;
        $reply->author_id = $question_id->user_id;
        $reply->sequence = 1;
        $reply->content = $request->content;

        $reply->save();

        $comment123 = new Comment();
        $comment123->question_id = $id;
        $comment123->user_id = Auth::user()->id;
        $comment123->author_id = $question_id->user_id;
        $comment123->sequence = 1;
        $comment123->content = $request->content;

        $comment123->save();

        return redirect()->back()->with('message', 'Comment Added Successfully');
    }
}
