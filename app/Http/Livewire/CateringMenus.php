<?php

namespace App\Http\Livewire;

use App\Models\CateringMenu;
use App\Models\CateringType;
use Livewire\Component;

class CateringMenus extends Component
{
    public $cateringTypes;
    public $cateringMenus;

    public function mount()
    {
        $this->cateringTypes = CateringType::has('cateringMenus')->get();
        $this->cateringMenus = CateringMenu::where('online', true)->get();
    }

    public function render()
    {
        return view('livewire.catering-menus');
    }
}
