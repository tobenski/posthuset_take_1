<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $home = Page::create([
            'name' => 'Forside',
            'online' => true,
        ]);
        $home->slug = '';
        $home->save();

        $home->seo()->create([
            'title' => 'Forside',
        ]);
    }
}
