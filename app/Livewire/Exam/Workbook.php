<?php

namespace App\Livewire\Exam;

use App\Jobs\SendEmail;
use App\Mail\CreateAnswer;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Support\Facades\Mail;
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
            $polesArray[$pole->name]['sum'] = 0;
            $polesArray[$pole->name]['poles']=[
                $pole->positive =>0 ,
                $pole->negative => 0,
            ];
        }
        //insert PolesArray with answer's Data
        foreach ($answer as $question_id =>$optionValue){
            $question = Question::query()->find($question_id);
            $poleNAme = $question->pole->name;
            if ($optionValue > 0 ){
                $positive = $question->pole->positive;
                $polesArray["$poleNAme"]['poles']["$positive"] += $optionValue;
                $polesArray["$poleNAme"]["sum"] += $optionValue;
            }elseif($optionValue < 0){
                $negative = $question->pole->negative;
                $polesArray["$poleNAme"]['poles']["$negative"] += abs($optionValue);
                $polesArray["$poleNAme"]["sum"] += abs($optionValue);
            }
        }
        $userName = $this->answer->user->name ;
        SendEmail::dispatch($this->answer->user->email,$polesArray,$userName);
//        Mail::to($this->answer->user->email)->send(new CreateAnswer([$polesArray,$userName]));
        return $polesArray;
    }

    public function render()
    {
        return view('livewire.exam.workbook');
    }
}
