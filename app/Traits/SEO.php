<?php

namespace App\Traits;

use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;

trait SEO
{
    public $title;
    public $description;
    public $keywords;
    public $canonical;

    public $og_title;
    public $og_description;
    public $og_url;
    public $og_type;
    public $og_images;

    public function useSEO()
    {
        $this->title ? SEOMeta::setTitle($this->title) : false;
        $this->description ? SEOMeta::setDescription($this->description) : false;
        $this->canonical ? SEOMeta::setCanonical($this->canonical) : false;
        $this->keywords ? SEOMeta::setKeywords($this->keywords) : false;

        $this->og_title ? OpenGraph::setTitle($this->og_title) : false;
        $this->og_description ? OpenGraph::setDescription($this->og_description) : false;
        $this->og_url ? OpenGraph::setUrl($this->og_url) : false;
        $this->og_type ? OpenGraph::addProperty('type', $this->og_type) : false;

        if ($this->og_images)
        {
            foreach ($$this->og_images as $image) {
                OpenGraph::addImage($image);
            }
        }


    }
}
