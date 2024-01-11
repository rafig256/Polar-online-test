<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function poles(){
        return $this->hasMany(Pole::class);
    }

    public function Questions(){
        return $this->hasManyThrough(Question::class,Pole::class);
    }
}
