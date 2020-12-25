<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TwoWayToggle extends Component
{
    public $leftLabel;
    public $rightLabel;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($leftLabel, $rightLabel)
    {
        $this->leftLabel = $leftLabel;
        $this->rightLabel = $rightLabel;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.two-way-toggle');
    }
}
