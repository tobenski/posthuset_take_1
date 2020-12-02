<?php

namespace App\Http\Livewire;

use App\Models\Menucard;
use App\Models\MenuType;
use Carbon\Carbon;
use Livewire\Component;

class Menukort extends Component
{
    public $type;
    public $menucard;
    public $menucards;

    public function mount($type=null)
    {

    }

    public function render()
    {
        return view('livewire.menukort');
    }
}
