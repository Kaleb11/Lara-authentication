<?php

use Illuminate\Database\Seeder;
use App\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Kaleb',
            'email' => 'Kaleb@gmail.com',
            'password' => bcrypt('1234567890'),
        ]);
    }
}
