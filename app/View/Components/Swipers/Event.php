<?php

namespace App\View\Components\Swipers;

use Illuminate\View\Component;

class Event extends Component
{
    public $slides;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($slides)
    {
        $this->slides = $slides;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.swipers.event');
    }
}
