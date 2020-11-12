<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Sidebar extends Component
{
    public $showSidebar = true;

    protected $listeners = ['open-sidebar' => 'openSidebar', 'close-sidebar' => 'closeSidebar', 'toggle-sidebar' => 'toggleSidebar'];


    public function render()
    {
        return view('livewire.sidebar');
    }

    public function openSidebar()
    {
        $this->showSidebar = true;
    }

    public function closeSidebar()
    {
        $this->showSidebar = false;
    }

    public function toggleSidebar()
    {
        $this->showSidebar = !$this->showSidebar;
    }
}
