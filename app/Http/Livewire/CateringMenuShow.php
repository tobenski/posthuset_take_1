<?php

namespace App\Http\Livewire;

use App\Models\CateringMenu;
use Livewire\Component;

class CateringMenuShow extends Component
{
    public CateringMenu $menu;

    public function render()
    {
        return view('livewire.catering-menu-show');
    }
}
