<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudyTimeRequest;
use App\Http\Controllers\Controller;
use App\Models\StudyTime;
use App\Models\Certification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class StudyTimeController extends Controller
{
    public function index(Certification $certification){
        return view('study_pages/index')->with(['certifications' => $certification->get()]);
    }
    
    public function store(StudyTimeRequest $request, StudyTime $studytime){
        $studytime->certification_id = $request['studytime']['certification_id'];
        $studytime->started_at = $request['studytime']['started_at'];
        $studytime->ended_at = $request['studytime']['ended_at'];
        $studytime->user_id = Auth::user()->id;
        
        $studytime->save();
        
        return redirect('/studytime/' . $studytime->user_id);
    }
}
