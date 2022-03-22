<?php

namespace App\Http\Controllers;

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

        return redirect()->back()->with('message', 'Comment Added Successfully');
    }
}
