<?php

namespace App\Livewire\Exam;

use App\Models\Answer;
use App\Models\Exam as ModelExam;
use App\Models\Question;
use Livewire\Component;

class RunExam extends Component
{
    public $exam;
    public $formFields = [];
    public $polesArray = [];


    public function saveForm()
    {

        $this->createPollsArray();
        $success = Answer::create([
            'user_id' => \Auth::user()->id,
            'answer' => json_encode($this->formFields),
            'exam_id' => $this->exam->id,
        ]);
        foreach ($this->formFields as $question_id =>$optionValue){
            $question = Question::query()->find($question_id);
            $poleNAme = $question->pole->name;

            if ($optionValue > 0 ){
                $positive = $question->pole->positive;
                $this->polesArray["$poleNAme"]["$positive"] += $optionValue;
            }elseif($optionValue < 0){
                $negative = $question->pole->negative;
                $this->polesArray["$poleNAme"]["$negative"] += abs($optionValue);
            }
        }
        return to_route('home');
    }

    public function createPollsArray():void
    {
        $poles = $this->exam->poles;
        foreach ($poles as $pole){
            $this->polesArray["$pole->name"] = ["$pole->positive"=>0 , $pole->negative => 0];
        }
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
