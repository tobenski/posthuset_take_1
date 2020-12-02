<?php

namespace App\Http\Livewire\Admin;

use App\Models\FrokostMenu;
use Livewire\Component;

class Frokost extends Component
{
    public $frokostmenuer;
    public $isOpen = false;



    public function render()
    {
        $this->frokostmenuer = FrokostMenu::all();

        return view('livewire.admin.frokost')
        ->layout('layouts.admin');
    }

    public function create()
    {
        $this->openModal();
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
