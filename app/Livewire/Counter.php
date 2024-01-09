<?php

namespace App\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $count = 2;
    public $name = "rafig";

    public function increment(){
        $this->count++;
    }

    public function render()
    {
        return view('livewire.counter');
    }

    public function mount()
    {
        
    }

    public function changeName()
    {
        $this->name = 'alpay';
    }
}
