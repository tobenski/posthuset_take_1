<?php

namespace Database\Seeders;

use App\Models\BorneMenu;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class BorneMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $f1 = BorneMenu::create([
            'firstday' => Carbon::now(),
            'online' => true,
        ]);


        $f1->retter()->createMany([
            [
                'name' => 'Første Borne Ret',
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
