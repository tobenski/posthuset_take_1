<?php

namespace Database\Seeders;

use App\Models\AftenMenu;
use App\Models\MenuType;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AftenMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $f1 = AftenMenu::create([
            'firstday' => Carbon::now()->subDays(10),
            'lastday' => Carbon::now()->addDays(20),
            'online' => true,
        ]);

        $f2 = AftenMenu::create([
            'firstday' => Carbon::now()->addDays(21),
            'lastday' => Carbon::now()->addDays(50),
            'online' => true,
        ]);


        $f3 = AftenMenu::create([
            'firstday' => Carbon::now()->addDays(51),
            'lastday' => Carbon::now()->addDays(81),
            'online' => true,
        ]);


        $f1->retter()->createMany([
            [
                'name' => 'Første Forret',
                'content' => 'Beskrivelse af retten - 1 aften menu ',
                'price' => 125,
                'menu_type_id' => 1,
            ],
            [
                'name' => 'Anden forret',
                'content' => 'Beskrivelse af retten',
                'price' => 225,
                'menu_type_id' => 1,
            ],
            [
                'name' => 'Tredje forret',
                'content' => 'Beskrivelse af retten',
                'price' => 325,
                'menu_type_id' => 1,
            ],
            [
                'name' => 'Første Hovedret',
                'content' => 'Beskrivelse af retten - 1 aften menu ',
                'price' => 125,
                'menu_type_id' => 3,
            ],
            [
                'name' => 'Anden Hovedret',
                'content' => 'Beskrivelse af retten',
                'price' => 225,
                'menu_type_id' => 3,
            ],
            [
                'name' => 'Tredje Hovedret',
                'content' => 'Beskrivelse af retten',
                'price' => 325,
                'menu_type_id' => 3,
            ],
            [
                'name' => 'Første Dessert',
                'content' => 'Beskrivelse af retten - 1 aften menu ',
                'price' => 125,
                'menu_type_id' => 5,
            ],
            [
                'name' => 'Anden Dessert',
                'content' => 'Beskrivelse af retten',
                'price' => 225,
                'menu_type_id' => 5,
            ],
            [
                'name' => 'Tredje Dessert',
                'content' => 'Beskrivelse af retten',
                'price' => 325,
                'menu_type_id' => 5,
            ],
        ]);

        $f2->retter()->createMany([
            [
                'name' => 'Første Forret',
                'content' => 'Beskrivelse af retten - 2 aften menu ',
                'price' => 125,
                'menu_type_id' => 1,
            ],
            [
                'name' => 'Anden forret',
                'content' => 'Beskrivelse af retten',
                'price' => 225,
                'menu_type_id' => 1,
            ],
            [
                'name' => 'Tredje forret',
                'content' => 'Beskrivelse af retten',
                'price' => 325,
                'menu_type_id' => 1,
            ],
            [
                'name' => 'Første Hovedret',
                'content' => 'Beskrivelse af retten - 2 aften menu ',
                'price' => 125,
                'menu_type_id' => 3,
            ],
            [
                'name' => 'Anden Hovedret',
                'content' => 'Beskrivelse af retten',
                'price' => 225,
                'menu_type_id' => 3,
            ],
            [
                'name' => 'Tredje Hovedret',
                'content' => 'Beskrivelse af retten',
                'price' => 325,
                'menu_type_id' => 3,
            ],
            [
                'name' => 'Første Osteret',
                'content' => 'Beskrivelse af retten - 2 aften menu ',
                'price' => 125,
                'menu_type_id' => 4,
            ],
            [
                'name' => 'Anden Dessert',
                'content' => 'Beskrivelse af retten',
                'price' => 225,
                'menu_type_id' => 5,
            ],
            [
                'name' => 'Tredje Dessert',
                'content' => 'Beskrivelse af retten',
                'price' => 325,
                'menu_type_id' => 5,
            ],
        ]);
    }
}
