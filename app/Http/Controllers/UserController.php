<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Thread;
use App\Models\Comment;
use App\Models\Job;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;


class UserController extends Controller
{
    public function show(User $user, Thread $thread, Comment $comment){
        return view('mypages/show')->with(['user' => $user, 'threads' => $thread->get(), 'comments' => $comment->get()]);
    }
    
    public function edit(User $user, Job $job){
        $user = Auth::user();
        return view('mypages/edit', ['user' => $user])->with(['jobs' => $job->get()]);
    }
    
    public function update(UserRequest $request, User $user){
        $user = Auth::user();
        
        $user->name = $request['user']['name'];
        $user->self_introduction = $request['user']['self_introduction'];
        $user->age = $request['user']['age'];
        $user->job_id = $request['user']['job_id'];
        
        $user->update();

        return redirect('/mypage/' . $user->id);
    }
}