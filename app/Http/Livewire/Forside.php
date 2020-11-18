<?php

namespace App\Http\Livewire;

use App\Models\Slide;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use SebastianBergmann\Environment\Console;

class Forside extends Component
{
    public $currentSlide = 0;
    public $counter = 0;
    public $bgImage;
    public $images = array(
        'https://wallpapercave.com/wp/wp2550666.jpg',
        'https://hideaways.imgix.net/frankrig/provence-alpes-cote-dazur/nice/Nice,-beach,-coast.jpg',
        'https://lp-cms-production.imgix.net/2019-06/3cb45f6e59190e8213ce0a35394d0e11-nice.jpg',
        'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTmTP6yaQIPdO-RGRtJY71VxYzYdFwtsGAVgw&usqp=CAU',
    );

    public $slides;


    protected $listeners = ['update-image' => 'updateImage', 'change-bg' => 'ChangeBackground'];

    public function mount()
    {
        $this->slides = Slide::all();
    }
    public function render()
    {
        $this->bgImage = $this->slides[$this->counter]->image;
        return view('livewire.forside');
    }

    public function ChangeBackground()
    {
        if($this->counter == count($this->slides)-1){
            $this->counter = 0;
        } else {
            $this->counter++;
        }
        $this->bgImage = $this->slides[$this->counter];
    }


}
