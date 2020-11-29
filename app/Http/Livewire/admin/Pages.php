<?php

namespace App\Http\Livewire\Admin;

use App\Models\Page;
use Livewire\Component;

class Pages extends Component
{
    public $pages, $name, $content, $slug, $page_id, $online;
    public $isOpen;

    public function render()
    {
        $this->pages = Page::all();

        return view('livewire.admin.pages')
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
        $this->name = '';
        $this->content = '';
        $this->slug = '';
        $this->online = false;
        $this->page_id = '';
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'content' => 'required',
            'online' => 'boolean',
        ]);

        Page::updateOrCreate(['id' => $this->page_id], [
            'name' => $this->name,
            'content' => $this->content,
            'online' => $this->online,
        ]);

        session()->flash('message', $this->page_id ? 'Page Updated Successfully!!' : 'Page Created Successfully!!');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $page = Page::findOrFail($id);
        $this->page_id = $id;
        $this->name = $page->name;
        $this->content = $page->content;
        $this->online = $page->online;

        $this->openModal();
    }

    public function delete($id)
    {
        Page::find($id)->delete();
        session()->flash('message', 'Page Deleted Successfully!!');
    }
}
