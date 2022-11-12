<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'self_introduction',
        'age',
        'job_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    //リレーション関連
    
    public function job(){
        return $this->belongsTo(Job::class);
    }
    
    public function threads(){
        return $this->hasMany(Thread::class);
    }
    
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    
    public function targets(){
        return $this->hasMany(Target::class);
    }
    
    public function studytimes(){
        return $this->hasMany(StudyTime::class);
    }
    
    public function questions(){
        return $this->hasMany(Question::class);
    }
    
    public function answers(){
        return $this->hasMany(Answer::class);
    }
    
}
