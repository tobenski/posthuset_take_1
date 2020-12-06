<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menu = Menu::create([
            'text' => 'Forside',
            'url' => route('home'),
            'order' => 0,

        ]);
        Menu::create([
            'text' => 'Menukort',
            'url' => route('menukort'),
            'order' => 1,

        ]);
        Menu::create([
            'text' => 'Arrangementer',
            'url' => route('home'),
            'order' => 2,

        ]);
        Menu::create([
            'text' => 'Take Away',
            'url' => route('home'),
            'order' => 3,

        ]);
        $menu = Menu::create([
            'text' => 'Kontakt',
            'url' => route('home'),
            'order' => 4,

        ]);
        $menu->children()->saveMany([
            Menu::create([
                'text' => 'Book Bord',
                'url' => route('home'),
                'order' => 0,

            ]),
            Menu::create([
                'text' => 'Skriv en besked',
                'url' => route('home'),
                'order' => 1,

            ]),
            Menu::create([
                'text' => 'Om Os',
                'url' => route('home'),
                'order' => 2,

            ]),
        ]);

    }
}
