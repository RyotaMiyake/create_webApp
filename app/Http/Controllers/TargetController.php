<?php

namespace App\Http\Controllers;

use App\Http\Requests\TargetRequest;
use App\Http\Controllers\Controller;
use App\Models\Target;
use App\Models\Certification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class TargetController extends Controller
{
    public function create(Certification $certification){
        return view('study_pages/targets/create')->with(['certifications' => $certification->get()]);
    }
    
    public function store(TargetRequest $request, Target $target){
        $target->certification_id = $request['target']['certification_id'];
        $target->completion_date = $request['target']['completion_date'];
        $target->completion_studytime = $request['target']['completion_studytime'];
        $target->user_id = Auth::user()->id;
        
        $target->save();
        
        return redirect('/studytime/' . $target->user_id);
    }
}
