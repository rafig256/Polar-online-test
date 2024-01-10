<?php

namespace App\Http\Controllers\Admin\Exam;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $exams = Exam::all();
        return view('Admin.Exam.index',['exams'=>$exams]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Exam.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'number_questions' => 'required|numeric|max:500',
            'time' => 'required|numeric|min:10|max:3600',
            'info' => 'required|min:10',
            'status'=> 'nullable',
            'designer'=> 'nullable|string',
            'description'=> 'string|nullable',
        ]);
        Exam::create($validatedData);
        return to_route('exam.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Exam $exam)
    {
        return view('Admin.Exam.show',['exam'=>$exam]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exam $exam)
    {
        return view('Admin.Exam.edit',['exam'=>$exam]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Exam $exam)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'number_questions' => 'required|numeric|max:500',
            'time' => 'required|numeric|min:10|max:3600',
            'info' => 'required|min:10',
            'status'=> 'nullable',
            'designer'=> 'nullable|string',
            'description'=> 'string|nullable',
        ]);
        if (!$request->get('status')){
            $validatedData['status'] = '0';
        }
        $exam->update($validatedData);
        return redirect()->route('exam.show',$exam->id)->withErrors([['success' => 'به روزرسانی با موفقیت انجام شد']]);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exam $exam)
    {
        $exam->delete();
        return redirect()->route('exam.index')->withErrors([['danger'=>"آزمون با موفقیت حذف شد"]]);
    }
}
