<?php

namespace Database\Seeders;

use App\Models\AnbefalerMenu;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AnbefalerMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $f1 = AnbefalerMenu::create([
            'firstday' => Carbon::now()->subDays(10),
            'lastday' => Carbon::now()->addDays(20),
            'online' => true,
            'comment' => '
            Pris ved valg fra "Posthuset Anbefaler" herover<br>
            3 retter: 329,- | 4 retter: 399,- | 5 retter: 459,-<br>
            Vinmenu: 3 gl. 199,- | 4 gl. 259,- | 5 gl. 299,-
            '
        ]);

        $f2 = AnbefalerMenu::create([
            'firstday' => Carbon::now()->addDays(21),
            'lastday' => Carbon::now()->addDays(50),
            'online' => true,
        ]);

        $f3 = AnbefalerMenu::create([
            'firstday' => Carbon::now()->addDays(51),
            'lastday' => Carbon::now()->addDays(81),
            'online' => true,
        ]);

        $f1->retter()->createMany([
            [
                'name' => 'Forret',
                'content' => 'Beskrivelse af retten - 1 Anbefaler menu',
                'price' => 99,
            ],
            [
                'name' => 'Mellemret',
                'content' => 'Beskrivelse af retten',
                'price' => 99,
            ],
            [
                'name' => 'Hovedret',
                'content' => 'Beskrivelse af retten',
                'price' => 225,
            ],
            [
                'name' => 'Ostebræt',
                'content' => 'Beskrivelse af retten',
                'price' => 85,
            ],
            [
                'name' => 'Dessert',
                'content' => 'Beskrivelse af retten',
                'price' => 79,
            ],
        ]);

        $f2->retter()->createMany([
            [
                'name' => 'Forret',
                'content' => 'Beskrivelse af retten - 2 Anbefaler menu',
                'price' => 99,
            ],
            [
                'name' => 'Mellemret',
                'content' => 'Beskrivelse af retten',
                'price' => 99,
            ],
            [
                'name' => 'Hovedret',
                'content' => 'Beskrivelse af retten',
                'price' => 225,
            ],
            [
                'name' => 'Ostebræt',
                'content' => 'Beskrivelse af retten',
                'price' => 85,
            ],
            [
                'name' => 'Dessert',
                'content' => 'Beskrivelse af retten',
                'price' => 79,
            ],
        ]);

        $f3->retter()->createMany([
            [
                'name' => 'Forret',
                'content' => 'Beskrivelse af retten - 3 Anbefaler menu',
                'price' => 99,
            ],
            [
                'name' => 'Mellemret',
                'content' => 'Beskrivelse af retten',
                'price' => 99,
            ],
            [
                'name' => 'Hovedret',
                'content' => 'Beskrivelse af retten',
                'price' => 225,
            ],
            [
                'name' => 'Ostebræt',
                'content' => 'Beskrivelse af retten',
                'price' => 85,
            ],
            [
                'name' => 'Dessert',
                'content' => 'Beskrivelse af retten',
                'price' => 79,
            ],
        ]);
    }
}
