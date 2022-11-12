<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionRequest;
use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Certification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class QuestionController extends Controller
{
    public function index(Question $question){
        return view('q_a_pages/index')->with(['questions' => $question->getPaginateByLimit()]);
    }
    
    public function create(Certification $certification){
        return view('q_a_pages/create')->with(['certifications' => $certification->get()]);
    }
    
    public function show(Question $question, Answer $answer){
        return view('q_a_pages/show')->with(['question' => $question, 'answers' => $answer->get()]);
    }
    
    public function store(QuestionRequest $request, Question $question){
        
        $question->title = $request['question']['title'];
        $question->body = $request['question']['body'];
        $question->certification_id = $request['question']['certification_id'];
        $question->user_id = Auth::user()->id;
        
        $question->save();
        
        return redirect('/questions');
    }
}
