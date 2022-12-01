<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTime;

class StudyTime extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'certification_id',
        'started_at',
        'ended_at',
        'user_id',
    ];
    
    //データの取得
    
    
    public function getForChart(int $limit_count = 7){
        $logs = $this->orderBy('started_at', 'DESC')->limit($limit_count)->get();
        foreach($logs as $log){
            $started_at = new DateTime($log['started_at']);
            $ended_at = new DateTime($log['ended_at']);
            $studyed_time = $started_at->diff($ended_at);
            $studyed_time_stack[] = $studyed_time->days*24 + $studyed_time->h;
            $studyed_day[] = substr($log['started_at'], 0, 10);
        }
        $chartData = array(array_reverse($studyed_day), array_reverse($studyed_time_stack));
        //dd($chartData[0]);
        return $chartData;
    }
    
    //リレーション関連
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function certification(){
        return $this->belongsTo(certification::class);
    }
}
