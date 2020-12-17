<?php

namespace Database\Seeders;

use App\Models\CateringMenu;
use Illuminate\Database\Seeder;

class CateringMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CateringMenu::factory()->times(30)->create();
        $menus = CateringMenu::all();
        foreach ($menus as $menu) {
            $menu->addMediaFromUrl('https://picsum.photos/200/300?random=' . ($menu->id+1))
            ->toMediaCollection('catering');
        }
    }
}
