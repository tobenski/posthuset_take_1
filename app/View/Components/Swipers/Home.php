<?php

namespace App\View\Components\Swipers;

use App\Models\Slide;
use Illuminate\View\Component;

class Home extends Component
{
    public $slides;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->slides = Slide::where('page', 'home')->where('online',true)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.swipers.home');
    }
}
