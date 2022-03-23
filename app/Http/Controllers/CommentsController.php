<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Reply;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function store($qid, $rid, $cid, Request $request)
    {
        $reply = Reply::where('id', '=', $rid)->first();
        $question = Question::where('id', '=', $qid)->first();
        $comment123 = Comment::where('id', '=', $cid)->first();

        if($reply <> null){
            $comment = new Comment();

            $comment->reply_id = $reply->id;
            $comment->question_id = $question->id;
            $comment->user_id = Auth::user()->id;
            $comment->author_id =  $reply->id;
            $comment->sequence = 1;
            $comment->content = $request->content;
    
            $comment->save();
        }

        if($comment123 <> null){
            $comment = new Comment();

            $comment->comment_id = $comment123->id;
            $comment->question_id = $question->id;
            $comment->user_id = Auth::user()->id;
            $comment->author_id =  $comment123->user_id;
            $comment->sequence = 1;
            $comment->content = $request->content;
            $comment->reply_to_content = $comment123->content;
    
            $comment->save();
        }

       

        return redirect()->back()->with('message', 'Question Posted Successfully');
    }
}
