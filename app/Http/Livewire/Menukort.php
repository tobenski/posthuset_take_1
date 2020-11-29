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
        if(!$type) {
            $this->type = $this->defaultMenu();
        } else {
            $this->type = MenuType::where('name',  $type)->first();
        }
        $this->menucards = Menucard::where('menu_type_id', $this->type)->where('online', true)->orderBy('first_day', 'asc')->get();
        $this->menucard = $this->menucards->first();
    }

    public function render()
    {
        return view('livewire.menukort');
    }


    private function defaultMenu()
    {
        $now = Carbon::now();
        if ($now->hour < 17)
        {
            return 1;
        } else {
            return 3;
        }
    }
}
