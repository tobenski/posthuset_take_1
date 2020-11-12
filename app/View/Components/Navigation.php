<?php

namespace App\View\Components;

use App\Models\Menu;
use Illuminate\View\Component;

class Navigation extends Component
{
    public $menus;
    //public $mainMenu;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->menus = Menu::all();
        $this->menus = Menu::doesntHave('parent')->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.navigation');
    }
}
