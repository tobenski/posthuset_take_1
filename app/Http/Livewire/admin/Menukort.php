<?php

namespace App\Http\Livewire\Admin;

use App\Models\Menucard;
use App\Models\MenuType;
use Carbon\Carbon;
use Livewire\Component;

class Menukort extends Component
{
    public $menucards, $firstday, $lastday, $content, $menutype, $types, $menucard_id;
    public $isOpen = false;
    public $online = false;

    public function render()
    {
        $this->menucards = Menucard::all();
        $this->types = MenuType::all();

        return view('livewire.admin.menukort')
                ->layout('layouts.admin');
    }

    public function create()
    {
        $this->resetInputFields();
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

    public function resetInputFields()
    {
        $this->firstday = Carbon::now()->format('Y-m-d');
        $this->lastday = Carbon::now()->format('Y-m-d');
        $this->content = '';
        $this->online = false;
    }

    public function store()
    {
        $this->validate([
            'firstday' => 'required',
            'lastday' => 'required|after:firstday',
            'content' => 'required',
            'online' => 'boolean',
        ]);

        Menucard::updateOrCreate(['id' => $this->menucard_id], [
            'first_day' => $this->firstday,
            'last_day' => $this->lastday,
            'content' => $this->content,
            'online' => $this->online,
            'menu_type_id' => $this->menutype,
        ]);

        session()->flash('message', $this->menucard_id ? 'Menukort Opdateret' : 'Menukort oprettet');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $menukort = Menucard::findOrFail($id);
        $this->menucard_id = $id;
        $this->firstday = $menukort->first_day->format('Y-m-d');
        $this->lastday = $menukort->last_day->format('Y-m-d');
        $this->content = $menukort->content;
        $this->online = $menukort->online;
        $this->menutype = $menukort->menu_type_id;

        $this->openModal();
    }

    public function delete($id)
    {
        Menucard::find($id);
        session()->flash('message', 'Menukort Slettet');
    }

}
