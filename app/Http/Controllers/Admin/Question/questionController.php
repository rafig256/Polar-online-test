<?php

namespace App\Http\Controllers\Admin\Question;

use App\Http\Controllers\Controller;
use App\Models\Pole;
use App\Models\Question;
use Illuminate\Http\Request;

class questionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = Question::all();
        return view('Admin.question.index',['questions'=>$questions]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $poles = Pole::all();
        return view('Admin.question.create',['poles'=>$poles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'text'=>'string',
            'pole_id'=>'required|exists:poles,id',
            'q1'=>"required|string",
            'q1point'=>"required|integer",
            'q2'=>"required|string",
            'q2point'=>"required|integer",
        ]);

        if ($validateData){
            Question::create($request->all());
            return to_route('question.index')->withErrors([['success'=>'سوال با موفقیت درج شد']]);
        }
        else{
            return to_route('question.index')->withErrors([['danger'=>'اعتبارسنجی با شکست مواجه شد']]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        return view('Admin.question.show',['question' => $question]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        $poles = Pole::all();
        return view("Admin.question.edit",['question'=>$question,'poles' => $poles]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $question)
    {
        $validateData = $request->validate([
            'text'=>'string',
            'pole_id'=>'required|exists:poles,id',
            'q1'=>"required|string",
            'q1point'=>"required|integer",
            'q2'=>"required|string",
            'q2point'=>"required|integer",
        ]);
        $question->update($request->all());
        return to_route('question.index')->withErrors([['success'=>'سوال با موفقیت ویرایش شد']]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        $question->delete();
        return to_route('question.index')->withErrors([['danger'=>'سوال با موفقیت حذف شد']]);
    }
}
