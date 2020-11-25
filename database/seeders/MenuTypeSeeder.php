<?php

namespace Database\Seeders;

use App\Models\MenuType;
use Illuminate\Database\Seeder;

class MenuTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MenuType::create([
            'name' => 'Frokost Menu',
            'time' => 'Serveres mellem 11.30 & 14.30',
        ]);

        MenuType::create([
            'name' => 'Eftermiddags Menu',
            'time' => 'Serveres mellem 11.30 & 16.30',
        ]);

        MenuType::create([
            'name' => 'Aften Menu',
            'time' => 'Serveres fra 17.30',
        ]);

        MenuType::create([
            'name' => 'Anbefaler Menu',
            'time' => 'Serveres fra 17.30',
        ]);

        MenuType::create([
            'name' => 'Børne Menu',
            'time' => 'Serveres hele dagen.',
        ]);
    }
}
