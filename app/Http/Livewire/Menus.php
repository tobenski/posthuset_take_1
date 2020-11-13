<?php

namespace App\Http\Livewire;

use App\Models\Menu;
use Livewire\Component;

class Menus extends Component
{
    public $menus, $text, $url, $menu_id, $parent_id, $order;
    public $isOpen;

    public function render()
    {
        $this->menus = Menu::all();

        return view('livewire.menus')
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

    private function resetInputFields()
    {
        $this->text = '';
        $this->url = '';
        $this->menu_id = '';
        $this->order = 0;
        $this->parent_id = null;
    }

    public function store()
    {
        $this->validate([
            'text' => 'required',
            'url' => 'required|url',
            'order' => 'required',
            'parent_id' => 'nullable',
        ]);

        Menu::updateOrCreate(['id' => $this->menu_id], [
            'text' => $this->text,
            'url' => $this->url,
            'order' => $this->order,
            'parent_id' => $this->parent_id,
        ]);

        session()->flash('message', $this->menu_id ? 'Menu Updated Successfully!!' : 'Menu Created Successfully!!');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        $this->menu_id = $id;
        $this->text = $menu->text;
        $this->url = $menu->url;
        $this->order = $menu->order;
        $this->parent_id = $menu->parent_id;

        $this->openModal();
    }

    public function delete($id)
    {
        Menu::find($id)->delete();
        session()->flash('message', 'Menu deleted succsfully!!');
    }
}
