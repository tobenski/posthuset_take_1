<?php

namespace Database\Seeders;

use App\Models\Slide;
use Illuminate\Database\Seeder;

class SlideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Slide::create([
            'title' => 'Slide 1',
            'content' => 'Slide 1 Content',
            'page' => 'home',
            'image' => 'https://wallpapercave.com/wp/wp2550666.jpg',
        ]);

        Slide::create([
            'title' => 'Slide 2',
            'content' => 'Slide 2 Content',
            'page' => 'home',
            'image' => 'https://hideaways.imgix.net/frankrig/provence-alpes-cote-dazur/nice/Nice,-beach,-coast.jpg',
        ]);

        Slide::create([
            'title' => 'Slide 3',
            'content' => 'Slide 3 Content',
            'page' => 'home',
            'image' => 'https://lp-cms-production.imgix.net/2019-06/3cb45f6e59190e8213ce0a35394d0e11-nice.jpg',

        ]);

        Slide::create([
            'title' => 'Slide 4',
            'content' => 'Slide 4 Content',
            'page' => 'home',
            'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTmTP6yaQIPdO-RGRtJY71VxYzYdFwtsGAVgw&usqp=CAU',

        ]);
    }
}
