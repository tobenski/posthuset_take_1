<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;

class Events extends Component
{
    public $events;

    public $event;

    public function mount(?Event $event)
    {
    }

    public function render()
    {
        $this->events = Event::where('online', true)->orderBy('date', 'asc')->get();


        return view('livewire.events');
    }


}
