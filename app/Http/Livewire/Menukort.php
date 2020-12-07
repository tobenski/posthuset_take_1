<?php

namespace App\Http\Livewire;

use App\Models\EftermiddagsMenu;
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
    public $eftermiddagsmenuer;
    public EftermiddagsMenu $currentEftermiddagsMenu;
    public $frokostmenuer;
    public FrokostMenu $currentFrokostMenu;

    public function mount($type=null)
    {
        $this->frokostmenuer = FrokostMenu::where('online', true)->where('lastday', '>=', \Carbon\Carbon::now())->get();
        $this->currentFrokostMenu = $this->frokostmenuer->first();
        $this->eftermiddagsmenuer = EftermiddagsMenu::where('online', true)->where('lastday', '>=', \Carbon\Carbon::now())->get();
        $this->currentEftermiddagsMenu = $this->eftermiddagsmenuer->first();
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


        if($this->openTab === 1 && $this->frokostmenuer[1])
        {
            $this->currentFrokostMenu = $this->frokostmenuer[1];
        }
        else if ($this->openTab === 2 && $this->eftermiddagsmenuer[1])
        {
            $this->currentEftermiddagsMenu = $this->eftermiddagsmenuer[1];
        }
        else
        {
            $this->current = true;
        }
    }

    public function currentMenu()
    {
        $this->current = true;
        $this->currentFrokostMenu = $this->frokostmenuer[0];
        $this->currentEftermiddagsMenu = $this->eftermiddagsmenuer[0];
    }
}
