<?php

namespace App\Livewire;

use Livewire\Component;

class Brightness extends Component
{
    public $brightness = 10;

    public function off(){
        $this->brightness = 0;
    }
    
    public function render()
    {
        return view('livewire.brightness');
    }
}
