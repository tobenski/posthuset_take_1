<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CateringMenuOrderLogout extends Component
{
    public $text;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($text = 'Logout')
    {
        $this->text = $text;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.catering-menu-order-logout');
    }
}
