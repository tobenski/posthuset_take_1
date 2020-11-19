<?php

// Lav order by
// Lav online prob
namespace App\Http\Livewire\Admin;

use App\Models\Slide;
use Livewire\Component;

class Slides extends Component
{
    public $slides, $title, $content, $page, $duration, $order, $slide_id;
    public $isOpen = false;
    public $online = false;

    public function render()
    {
        $this->slides = Slide::all();

        return view('livewire.admin.slides')
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
        $this->title = '';
        $this->content = '';
        $this->page = '';
        $this->duration = null;
        $this->online = false;
        $this->order = null;
    }

    public function store()
    {
        $this->validate([
            'title' => 'required',
            'content' => 'required',
            'page' => 'required',
            'duration' => 'nullable',
            'online' => 'boolean',
            'order' => 'nullable',
        ]);

        Slide::updateOrCreate(['id' => $this->slide_id], [
            'title' => $this->title,
            'content' => $this->content,
            'page' => $this->page,
            'duration' => $this->duration,
            'online' => $this->online,
            'order' => $this->order,
        ]);

        session()->flash('message', $this->slide_id ? 'Slide Updated Successfully!!' : 'Slide Created Successfully!!');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $slide = Slide::findOrFail($id);
        $this->slide_id = $id;
        $this->title = $slide->title;
        $this->content = $slide->content;
        $this->page = $slide->page;
        $this->duration = $slide->duration;
        $this->online = $slide->online;
        $this->order = $slide->order;

        $this->openModal();
    }

    public function delete($id)
    {
        Slide::find($id)->delete();
        session()->flash('message', 'Slide Deleted Successfully!!');
    }
}
