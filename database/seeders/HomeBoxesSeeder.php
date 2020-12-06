<?php

namespace Database\Seeders;

use App\Models\HomeBoxes;
use Illuminate\Database\Seeder;

class HomeBoxesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HomeBoxes::create([
            'title' => 'Restauranten',
            'content' => 'Her kan der være en beskrivelse af Restauranten eller lign',
            'button' => 'Se Menukort',
            'link' => '/menukort',
            'online' => true,
        ]);

        HomeBoxes::create([
            'title' => 'Catering',
            'content' => 'Her kan der være en beskrivelse af Mad ud af huset eller lign',
            'button' => 'Se Mulighederne',
            'link' => '/catering',
            'online' => true,
        ]);

        HomeBoxes::create([
            'title' => 'Take Away',
            'content' => 'Her kan der være en beskrivelse af Take away eller lign',
            'button' => 'Se Take Away Kort',
            'link' => '/take-away',
            'online' => true,
        ]);
    }
}
