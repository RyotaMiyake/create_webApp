<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudyTime;

class ChartController extends Controller
{
    public function chartGet(StudyTime $studytime){
        
        return $studytime->getForChart();
    }
}
