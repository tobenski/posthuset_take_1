<?php

namespace App\Http\Livewire;

use App\Models\AftenMenu;
use App\Models\AnbefalerMenu;
use App\Models\BorneMenu;
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
    public $currentAnbefaler = true;
    public $currentAften = true;
    public $openTab = 1;
    public $menucard;
    public $menucards;
    public $eftermiddagsmenuer;
    public EftermiddagsMenu $currentEftermiddagsMenu;
    public $frokostmenuer;
    public FrokostMenu $currentFrokostMenu;
    public $bornemenuer;
    public BorneMenu $currentBorneMenu;
    public $aftenmenuer;
    public AftenMenu $currentAftenMenu;
    public $anbefalermenuer;
    public AnbefalerMenu $currentAnbefalerMenu;


    public function mount($type = null)
    {
        $this->frokostmenuer = FrokostMenu::where('online', true)->where('lastday', '>=', \Carbon\Carbon::now())->get();
        $this->currentFrokostMenu = $this->frokostmenuer->first();
        $this->eftermiddagsmenuer = EftermiddagsMenu::where('online', true)->where('lastday', '>=', \Carbon\Carbon::now())->get();
        $this->currentEftermiddagsMenu = $this->eftermiddagsmenuer->first();
        $this->bornemenuer = BorneMenu::where('online', true)->get();
        $this->currentBorneMenu = $this->bornemenuer->where('firstday', '<=', \Carbon\Carbon::now())->first();
        $this->aftenmenuer = AftenMenu::where('online', true)->where('lastday', '>=', Carbon::now())->get();
        $this->currentAftenMenu = $this->aftenmenuer->first();
        $this->anbefalermenuer = AnbefalerMenu::where('online', true)->where('lastday', '>=', Carbon::now())->get();
        $this->currentAnbefalerMenu = $this->anbefalermenuer->first();
        $this->setOpenTab($type);
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
        else if ($this->openTab == 3)
        {

        }
        else if ($this->openTab === 4)
        {
            $this->current = true;
        }
        else
        {
            $this->current = true;
        }
    }

    public function nextAnbefalerMenu()
    {
        if ($this->anbefalermenuer[1])
        {
            $this->currentAnbefalerMenu = $this->anbefalermenuer[1];
            $this->currentAnbefaler = false;
        }
        else
        {
            $this->currentAnbefaler = true;
        }
    }

    public function nextAftenMenu()
    {
        if ($this->aftenmenuer[1])
        {
            $this->currentAftenMenu = $this->aftenmenuer[1];
            $this->currentAften = false;
        }
        else
        {
            $this->currentAften = true;
        }
    }

    public function currentAnbefalerMenu()
    {
        $this->currentAnbefaler = true;
        $this->currentAnbefalerMenu = $this->anbefalermenuer[0];
    }

    public function currentAftenMenu()
    {
        $this->currentAften = true;
        $this->currentAftenMenu = $this->aftenmenuer[0];
    }

    public function currentMenu()
    {
        $this->current = true;
        $this->currentAften = true;
        $this->currentAnbefaler = true;

        $this->currentFrokostMenu = $this->frokostmenuer[0];
        $this->currentEftermiddagsMenu = $this->eftermiddagsmenuer[0];
        $this->currentBorneMenu = $this->bornemenuer[0];
        $this->currentAnbefalerMenu = $this->anbefalermenuer[0];
        $this->currentAftenMenu = $this->aftenmenuer[0];
    }

    public function setOpenTab($type)
    {
        switch ($type) {
            case 'frokost':
            case 'Frokost':
                $this->openTab = 1;
                break;

            case 'eftermiddag':
            case 'Eftermiddag':
                $this->openTab = 2;
                break;

            case 'aften':
            case 'Aften':
                $this->openTab = 3;
                break;

            case 'born':
            case 'Born':
                $this->openTab = 4;
                break;

            default:
                $this->openTabByTime($type);
                break;
        }
    }

    public function openTabByTime($type)
    {
        $now = Carbon::now();
        if($now->hour <= 14) {
            $this->openTab = 1;
        } elseif ($now->hour > 14 && $now->hour < 17 ) {
            $this->openTab = 2;
        } else {
            $this->openTab = 3;
        }
    }
}
