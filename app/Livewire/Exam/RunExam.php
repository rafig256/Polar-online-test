<?php

namespace App\Livewire\Exam;

use App\Models\Exam as ModelExam;
use Livewire\Component;

class RunExam extends Component
{
    public $exam;
    public $formFields=[];


    public function saveForm()
    {
        dd($this->formFields);
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
