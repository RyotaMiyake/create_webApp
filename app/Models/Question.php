<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    
    //リレーション関連
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function certification(){
        return $this->belongsTo(Certification::class);
    }
    
    public function answers(){
        return $this->hasMany(Answer::class);
    }
}
