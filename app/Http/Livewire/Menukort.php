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
    public $current = true;
    public $openTab = 1;
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


    public function showTab($tab)
    {
        $this->openTab = $tab;
        $this->currentMenu();
    }

    public function nextMenu()
    {
        $this->current = false;
        if($this->frokostmenuer[1])
        {
            $this->currentFrokostMenu = $this->frokostmenuer[1];
        } else {
            $this->current = true;
        }
    }

    public function currentMenu()
    {
        $this->current = true;
        $this->currentFrokostMenu = $this->frokostmenuer[0];
    }
}
