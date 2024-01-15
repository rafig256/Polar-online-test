<?php

namespace App\Livewire\Exam;

use App\Models\Answer;
use App\Models\Question;
use Livewire\Component;

class Workbook extends Component
{
    public Answer $answer;

    public $polesArray = [];

    public function mount(){
        $this->polesArray = $this->createPollsArray($this->answer);

    }

    public function createPollsArray($answerModel): array
    {
        $answer = json_decode($answerModel->answer);
        $exam = $answerModel->exam;
        $poles = $exam->poles;
        //create empty PolesArray
        $polesArray = [];
        foreach ($poles as $pole){
            $polesArray["$pole->name"] = ["$pole->positive"=>0 , $pole->negative => 0];
        }
        //insert PolesArray with answer's Data
        foreach ($answer as $question_id =>$optionValue){
            $question = Question::query()->find($question_id);
            $poleNAme = $question->pole->name;
            if ($optionValue > 0 ){
                $positive = $question->pole->positive;
                $polesArray["$poleNAme"]["$positive"] += $optionValue;
            }elseif($optionValue < 0){
                $negative = $question->pole->negative;
                $polesArray["$poleNAme"]["$negative"] += abs($optionValue);
            }
        }
        return $polesArray;
    }

    public function render()
    {
        return view('livewire.exam.workbook');
    }
}
