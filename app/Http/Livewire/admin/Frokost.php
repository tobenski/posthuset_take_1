<?php

namespace App\Http\Livewire\Admin;

use App\Models\FrokostMenu;
use App\Models\Ret;
use Livewire\Component;

class Frokost extends Component
{
    public $frokostmenuer, $timeframe, $firstday, $lastday;
    public $name, $content, $price;
    public FrokostMenu $frokostmenu;
    public $online = false;
    public $isOpen = false;

    protected $rules = [
        'frokostmenu.firstday' => '',
        'frokostmenu.lastday' => '',
        'frokostmenu.timeframe' => 'required|string|min:6',
        'frokostmenu.comment' => '',
        'frokostmenu.image' => '',
        'frokostmenu.online' => 'boolean',
    ];

    public function render()
    {
        $this->frokostmenuer = FrokostMenu::all();

        return view('livewire.admin.frokost')
        ->layout('layouts.admin');
    }

    public function create()
    {
        $validatedeData = $this->validate([
            'firstday' => 'required',
            'lastday' => 'required|after:firstday',
        ]);

        FrokostMenu::create($validatedeData);
        $this->render();

    }

    public function createRet()
    {
        $validatedeData = $this->validate([
            'name' => 'required|string',
            'content' => 'required|string',
            'price' => 'required|numeric',
        ]);


        $this->frokostmenu->retter()->create($validatedeData);

    }

    public function edit($id)
    {
        $this->frokostmenu = FrokostMenu::findOrFail($id);
        $this->openModal();

    }

    // Updated Hook https://github.com/tobenski/tobenskiBooking/blob/master/app/Http/Livewire/Settings.php
    public function updated($name, $value)
    {
        $this->validateOnly($name);
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }
}
