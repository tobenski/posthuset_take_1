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
            'content' => '
                <div x-show="show"
                    x-transition:enter="transition ease-out duration-300 origin-top"
                    x-transition:enter-start="transform -translate-y-32"
                    x-transition:enter-end="transform translate-y-0"
                    x-transition:leave="transition ease-in duration-0"
                    x-transition:leave-start="opacity-0 transform scale-100"
                    x-transition:leave-end="opacity-0 transform scale-90"
                    x-cloak
                    class="flex flex-col rounded-xl bg-white bg-opacity-75 w-auto py-8 px-16">
                    <h1 x-show.immediate="show"
                        x-transition:enter="transition ease-out duration-1000 origin-left"
                        x-transition:enter-start="transform -translate-x-64"
                        x-transition:enter-end="transform translate-x-0"
                        x-transition:leave="transition ease-in duration-0"
                        x-transition:leave-start="opacity-0 transform scale-100"
                        x-transition:leave-end="opacity-0 transform scale-90"
                        x-cloak
                        class="text-4xl uppercase font-extrabold text-center w-full font-sche">
                        Åbningstider
                    </h1>
                    <p x-show="show"
                        x-transition:enter="transition ease-out duration-1500"
                        x-transition:enter-start="opacity-0 transform scale-90"
                        x-transition:enter-end="opacity-100 transform scale-100"
                        x-transition:leave="transition ease-in duration-0"
                        x-transition:leave-start="opacity-0 transform"
                        x-transition:leave-end="opacity-0 transform"
                        x-cloak
                        class="w-full text-center leading-loose">
                        <span class="font-bold text-xl">Tirsdag - Lørdag:</span><br />
                        <span class="">11.30 - 16.30 & 17.30 - 20.30</span><br />
                        <span class="italic text-sm">(20.30 er sidste mulighed for ankomst, vi lukker først når alle er færdige)</span>
                    </p>
                </div>
            ',
            'page' => 'home',
            'image' => 'https://det-gamle-posthus.dk/wp-content/uploads/2020/03/MG_6554-scaled.jpg',
            'online' => true,
        ]);

        Slide::create([
            'title' => 'Slide 2',
            'content' => '
                <div x-show="show"
                    x-cloak
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform scale-90"
                    x-transition:enter-end="opacity-100 transform scale-100"
                    x-transition:leave="transition ease-in"
                    x-transition:leave-start="opacity-0 transform scale-100"
                    x-transition:leave-end="opacity-0 transform scale-90"
                    class="text-4xl uppercase font-extrabold" >
                    Åbningstider
                </div>
            ',
            'page' => 'home',
            'image' => 'https://hideaways.imgix.net/frankrig/provence-alpes-cote-dazur/nice/Nice,-beach,-coast.jpg',
            'online' => true,
            'duration' => 10000,
        ]);

        Slide::create([
            'title' => 'Slide 3',
            'content' => '
                <div x-show="show"
                    x-cloak
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform scale-90"
                    x-transition:enter-end="opacity-100 transform scale-100"
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-0 transform scale-100"
                    x-transition:leave-end="opacity-0 transform scale-90"
                    class="text-4xl uppercase font-extrabold" >
                    Slide 3
                </div>
            ',
            'page' => 'home',
            'image' => 'https://lp-cms-production.imgix.net/2019-06/3cb45f6e59190e8213ce0a35394d0e11-nice.jpg',
            'online' => true,
        ]);

        Slide::create([
            'title' => 'Slide 4',
            'content' => '
                <div x-show="show"
                    x-cloak
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform scale-90"
                    x-transition:enter-end="opacity-100 transform scale-100"
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-0 transform scale-100"
                    x-transition:leave-end="opacity-0 transform scale-90"
                    class="text-4xl uppercase font-extrabold" >
                    Slide 4
                </div>
            ',
            'page' => 'home',
            'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTmTP6yaQIPdO-RGRtJY71VxYzYdFwtsGAVgw&usqp=CAU',
            'online' => true,
        ]);
    }
}
