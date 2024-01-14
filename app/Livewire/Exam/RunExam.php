<?php

namespace App\Livewire\Exam;

use App\Models\Answer;
use App\Models\Exam as ModelExam;
use Livewire\Component;

class RunExam extends Component
{
    public $exam;
    public $formFields=[];


    public function saveForm()
    {
        $success = Answer::create([
            'user_id' => \Auth::user()->id,
            'answer'=> json_encode($this->formFields),
            'exam_id' => $this->exam->id,
        ]);
        dd($success);
    }


    public function mount($id)
    {
        $this->exam = ModelExam::find($id);
    }
    public function render()
    {
        return view('livewire.exam.run-exam');
    }

}
