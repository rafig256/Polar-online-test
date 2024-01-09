<?php

namespace App\Livewire\Index;


use Livewire\Component;

class ExamCard extends Component
{
    public $exam;

    public function mount($exam): void
    {
        $this->exam = $exam;
    }

    public function render(){

        return view('livewire.index.exam-card');
    }
}
