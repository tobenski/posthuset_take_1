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
            'name' => 'forret',
        ]);

        MenuType::create([
            'name' => 'mellemret',
        ]);

        MenuType::create([
            'name' => 'hovedret',
        ]);

        MenuType::create([
            'name' => 'ost',
        ]);

        MenuType::create([
            'name' => 'dessert',
        ]);
    }
}
