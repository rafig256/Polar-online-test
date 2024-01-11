<?php

namespace App\Http\Controllers\Admin\Pole;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\Pole;
use Illuminate\Http\Request;

class PoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pols = Pole::all();
        return view('Admin.Pole.index',['poles'=>$pols]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $exams = Exam::all();
        return view('Admin.Pole.create',['exams'=>$exams]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
           'name'=>'string|required',
           'positive'=>'string|required',
           'negative'=>'string|required',
           'exam_id'=>'required | exists:exams,id',
        ]);
        Pole::create($validatedData);
        return redirect()->route('pole.index')->withErrors([['success'=>'قطب با موفقیت ذخیره شد']]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pole $pole)
    {
        $exams = Exam::all();
        return view('Admin.Pole.edit',['pole'=>$pole , 'exams'=>$exams]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pole $pole)
    {
        $validatedData = $request->validate([
            'name'=>'string|required',
            'positive'=>'string|required',
            'negative'=>'string|required',
            'exam_id'=>'required | exists:exams,id',
        ]);
        $pole->update($validatedData);
        return to_route('pole.index')->withErrors([['success'=>'قطب با موفقیت به روزرسانی شد']]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pole $pole)
    {
        $pole->delete();
        return to_route('pole.index')->withErrors([['danger'=>'قطب با موفقیت حذف شد']]);
    }
}
