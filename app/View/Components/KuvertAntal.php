<?php

namespace App\View\Components;

use Illuminate\View\Component;

class KuvertAntal extends Component
{
    public $min;
    public $max;
    public $value;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($min, $max = 50, $value = null)
    {
        $this->value = $value ? $value : $min;
        $this->min = $min;
        $this->max = $max;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.kuvert-antal');
    }
}
