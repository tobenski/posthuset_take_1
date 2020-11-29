<?php

namespace App\Http\Livewire;

use App\Models\Page;
use App\Models\Slide;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use SebastianBergmann\Environment\Console;

class Forside extends Component
{
    public $slides;
    public $page;

    public function mount()
    {
        $this->slides = Slide::all();
        $this->page = Page::where('slug', 'forside')->first();
    }

    public function render()
    {
        return view('livewire.forside');
    }




}
