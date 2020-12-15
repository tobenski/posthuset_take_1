<?php

namespace App\Http\Livewire;

use App\Models\Event;
use App\Models\Slide;
use Livewire\Component;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;

class Test extends Component
{

    public $slides;

    public $events;
    public $event;

    public function render()
    {
        $this->events = Event::where('online', true)->orderBy('date', 'asc')->get();
        return view('livewire.test');
    }

    public function mount(?Event $event)
    {

    }
}
