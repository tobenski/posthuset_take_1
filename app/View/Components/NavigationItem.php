<?php

namespace App\View\Components;

use App\Models\Menu;
use Illuminate\View\Component;

class NavigationItem extends Component
{
    public Menu $menu;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Menu $menu)
    {
        $this->menu = $menu;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.navigation-item');
    }
}
