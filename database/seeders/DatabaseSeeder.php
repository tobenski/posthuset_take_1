<?php

namespace Database\Seeders;


use App\Models\Event;
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
        $admin = User::create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'phone' => 12345678,
            'password' => Hash::make('Password')
        ]);
        $admin->addRole('admin');

        $user = User::create([
            'name' => 'Customer',
            'email' => 'customer@test.com',
            'phone' => 87654321,
            'password' => Hash::make('Password'),
        ]);
        $user->addRole('customer');


        $this->call([
            MenuSeeder::class,
            SlideSeeder::class,
            PageSeeder::class,
            HomeBoxesSeeder::class,
            FrokostMenuSeeder::class,
            EftermiddagsMenuSeeder::class,
            BorneMenuSeeder::class,
            MenuTypeSeeder::class,
            AftenMenuSeeder::class,
            AnbefalerMenuSeeder::class,
            EventSeeder::class,
            CateringTypeSeeder::class,
            CateringMenuSeeder::class,
            ]);



    }
}
