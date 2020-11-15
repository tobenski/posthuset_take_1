<?php

namespace App\Http\Livewire;

use App\Models\Slide;
use Livewire\Component;

class Test extends Component
{

    public $slides;

    public function render()
    {
        return view('livewire.test');
    }

    public function mount()
    {
        $this->slides = Slide::all();
    }
}
