<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    use HasFactory;
    
    //リレーション関連
    
    public function targets(){
        return $this->hasMany(Target::class);
    }
    
    public function studytimes(){
        return $this->hasMany(StudyTime::class);
    }
    
    public function questions(){
        return $this->hasMany(Question::class);
    }
}
