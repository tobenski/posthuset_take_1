<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'password' => Hash::make('Password')
        ]);
        $user->addRole('admin');
        $this->call([
            MenuSeeder::class,
            SlideSeeder::class,
            PageSeeder::class,
            HomeBoxesSeeder::class,
            FrokostMenuSeeder::class,
            EftermiddagsMenuSeeder::class,
            BorneMenuSeeder::class,
            ]);
    }
}
