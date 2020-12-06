<?php

namespace Database\Seeders;

use App\Models\FrokostMenu;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class FrokostMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $f1 = FrokostMenu::create([
            'firstday' => Carbon::now()->subDays(10),
            'lastday' => Carbon::now()->addDays(20),
            'online' => true,
        ]);

        $f2 = FrokostMenu::create([
            'firstday' => Carbon::now()->addDays(21),
            'lastday' => Carbon::now()->addDays(50),
            'online' => true,
        ]);

        $f3 = FrokostMenu::create([
            'firstday' => Carbon::now()->addDays(51),
            'lastday' => Carbon::now()->addDays(81),
            'online' => true,
        ]);

        $f1->retter()->createMany([
            [
                'name' => 'Første Ret',
                'content' => 'Beskrivelse af retten',
                'price' => 125,
            ],
            [
                'name' => 'Anden Ret',
                'content' => 'Beskrivelse af retten',
                'price' => 225,
            ],
            [
                'name' => 'Tredje Ret',
                'content' => 'Beskrivelse af retten',
                'price' => 325,
            ],
        ]);

        $f2->retter()->createMany([
            [
                'name' => 'Første Ret',
                'content' => 'Beskrivelse af retten',
                'price' => 125,
            ],
            [
                'name' => 'Anden Ret',
                'content' => 'Beskrivelse af retten',
                'price' => 225,
            ],
            [
                'name' => 'Tredje Ret',
                'content' => 'Beskrivelse af retten',
                'price' => 325,
            ],
        ]);

        $f3->retter()->createMany([
            [
                'name' => 'Første Ret',
                'content' => 'Beskrivelse af retten',
                'price' => 125,
            ],
            [
                'name' => 'Anden Ret',
                'content' => 'Beskrivelse af retten',
                'price' => 225,
            ],
            [
                'name' => 'Tredje Ret',
                'content' => 'Beskrivelse af retten',
                'price' => 325,
            ],
        ]);
    }
}