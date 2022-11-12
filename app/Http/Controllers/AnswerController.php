<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnswerRequest;
use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Question;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AnswerController extends Controller
{
    public function store(AnswerRequest $request, Answer $answer, Question $question){
        
        $answer->body = $request['answer']['body'];
        $answer->user_id = Auth::user()->id;
        $answer->question_id = $question->id;
        
        $answer->save();
        
        return redirect('/questions/' . $answer->question_id);
    }
}
