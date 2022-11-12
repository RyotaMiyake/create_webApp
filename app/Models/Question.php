<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'body',
        'certification_id',
        'user_id',
    ];
    
    //データ取得と表示
    public function getByLimit(int $limit_count = 15){
        return $this->orderBy('updated_at', 'DESC')->limit($limit_count)->get();
    }
    
    //ページネーション
    public function getPaginateByLimit(int $limit_count = 5){
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
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
