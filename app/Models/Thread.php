<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'user_id',
    ];
    
    //データの取得と表示
    public function getByLimit(int $limit_count = 5){
        return $this->orderBy('updated_at', 'DESC')->limit($limit_count)->get();
    }
    
    //ページネーション
    public function getPaginateByLimit(int $limit_count = 10){
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    //リレーション関連
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
