<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Exam;
use App\Models\User;
use Illuminate\Http\Request;

class index extends Controller
{
    public function index()
    {
        $userCount = User::count();
        $examCount = Exam::count();
        $answerCount = Answer::count();
        return view('Admin.index',[
            'userCount'=>$userCount,
            'examCount'=>$examCount,
            'answerCount'=>$answerCount
            ]);
    }
}
