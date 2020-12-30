<?php

use App\Setting;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name' => 'Admin Evoting',
            'email' => 'suhericode@gmail.com',
            'password' => bcrypt('kangfikri16')
        ]);
        Setting::create([
            'hasil' => 0,
            'voting' => 0,
        ]);
    }
}
