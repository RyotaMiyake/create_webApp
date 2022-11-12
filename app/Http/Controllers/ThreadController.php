<?php

namespace App\Http\Controllers;

use App\Http\Requests\ThreadRequest;
use App\Http\Controllers\Controller;
use App\Models\Thread;
use App\Models\Comment;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class ThreadController extends Controller
{
    public function index(Thread $thread){
        return view('thread_pages/index')->with(['threads' => $thread->getPaginateByLimit()]);
    }
    
    public function show(Thread $thread, Comment $comment){
        return view('thread_pages/show')->with(['thread' => $thread, 'comments' => $comment->get()]);
    }
    
    public function store(ThreadRequest $request, Thread $thread){
        
        $thread->title = $request['thread']['title'];
        $thread->user_id = Auth::user()->id;
        $thread->save();
        
        return redirect('/threads');
    }
}
