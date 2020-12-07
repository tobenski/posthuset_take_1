<?php

namespace Database\Seeders;

use App\Models\EftermiddagsMenu;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class EftermiddagsMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $f1 = EftermiddagsMenu::create([
            'firstday' => Carbon::now()->subDays(10),
            'lastday' => Carbon::now()->addDays(20),
            'online' => true,
        ]);

        $f2 = EftermiddagsMenu::create([
            'firstday' => Carbon::now()->addDays(21),
            'lastday' => Carbon::now()->addDays(50),
            'online' => true,
        ]);

        $f3 = EftermiddagsMenu::create([
            'firstday' => Carbon::now()->addDays(51),
            'lastday' => Carbon::now()->addDays(81),
            'online' => true,
        ]);

        $f1->retter()->createMany([
            [
                'name' => 'Første eftermiddagfsRet',
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
                'name' => 'Første eftermiddagsRet',
                'content' => 'Beskrivelse af 2 menu',
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
                'name' => 'Første eftermiddagsRet',
                'content' => 'Beskrivelse af 3 menu',
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
