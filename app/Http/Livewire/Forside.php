<?php

namespace App\Http\Livewire;

use App\Models\HomeBoxes;
use App\Models\Page;
use App\Models\Slide;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use SebastianBergmann\Environment\Console;

class Forside extends Component
{
    public $page;
    public $boxes;

    public function mount()
    {
        $this->boxes = HomeBoxes::where('online', true)->get();
        $this->page = Page::where('slug', '')->first();
        $this->SEO();

    }

    public function render()
    {
        return view('livewire.forside');
    }

    private function SEO()
    {
        $this->page->seo->title ? SEOMeta::setTitle($this->page->seo->title) : false;
        $this->page->description ? SEOMeta::setDescription($this->page->seo->description) : false;
        $this->page->keywords ? SEOMeta::addKeyword(explode(',', $this->page->seo->keywords)) : false;

        $this->page->og_title ? OpenGraph::setTitle($this->page->seo->og_title) : false;
        $this->page->og_description ? OpenGraph::setDescription($this->page->seo->og_description) : false;
        $this->page->og_url ? OpenGraph::setUrl($this->page->seo->og_url) : false;
        $this->page->og_type ? OpenGraph::addProperty('type', $this->page->seo->og_type) : false;
        $this->page->og_image ? OpenGraph::addImage($this->page->seo->og_image) : false;
    }




}
