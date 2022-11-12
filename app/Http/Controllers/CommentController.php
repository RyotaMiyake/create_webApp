<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Thread;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class CommentController extends Controller
{
    public function store(CommentRequest $request, Comment $comment, Thread $thread){
        
        $comment->body = $request['comment']['body'];
        $comment->user_id = Auth::user()->id;
        $comment->thread_id = $thread->id;
        
        $comment->save();
        
        return redirect('/threads/' . $comment->thread_id);
    }
}
