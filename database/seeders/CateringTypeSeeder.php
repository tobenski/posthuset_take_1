<?php

namespace Database\Seeders;

use App\Models\CateringType;
use Illuminate\Database\Seeder;

class CateringTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CateringType::create([
            'name' => 'Brunch'
        ]);
        CateringType::create([
            'name' => 'Buffet'
        ]);
        CateringType::create([
            'name' => 'Charcuteri'
        ]);
        CateringType::create([
            'name' => 'Julefrokost'
        ]);
        CateringType::create([
            'name' => 'Menu'
        ]);
    }
}
