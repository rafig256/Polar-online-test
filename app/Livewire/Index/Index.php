<?php

namespace App\Livewire\Index;

use App\Models\Exam;
use Livewire\Component;

class Index extends Component
{
    public $exams;
    public function mount(): void
    {
        $this->exams = Exam::all();
    }
    public function render()
    {
        return view('livewire.index.index');
    }
}
