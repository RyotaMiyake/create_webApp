<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Target extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'certification_id',
        'completion_date',
        'completion_studytime',
        'user_id',
    ];
    
    //リレーション関連
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function certification(){
        return $this->belongsTo(certification::class);
    }
}
