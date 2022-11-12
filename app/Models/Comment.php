<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    
    protected $fill = [
        'body',
        'user_id',
        'thread_id',
    ];
    
    //データ取得と表示
    public function getByLimit(int $limit_count = 15){
        return $this->orderBy('updated_at', 'DESC')->limit($limit_count)->get();
    }
    
    //リレーション関連
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function thread(){
        return $this->belongsTo(Thread::class);
    }
}
