<?php

namespace App\Http\Livewire;

use App\Models\FrokostMenu;
use App\Models\Menucard;
use App\Models\MenuType;
use Carbon\Carbon;
use Livewire\Component;

class Menukort extends Component
{
    public $type;
    public $menucard;
    public $menucards;
    public $frokostmenuer;
    public FrokostMenu $currentFrokostMenu;

    public function mount($type=null)
    {
        $this->frokostmenuer = FrokostMenu::where('online', true)->where('lastday', '>=', \Carbon\Carbon::now())->get();
        $this->currentFrokostMenu = $this->frokostmenuer->first();
    }

    public function render()
    {
        return view('livewire.menukort');
    }
}
