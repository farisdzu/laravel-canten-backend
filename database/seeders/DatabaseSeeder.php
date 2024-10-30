<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;






class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        //CARA MEMBUAT DATA DUMY

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'phone' =>'082113004533',
            'role' => 'admin',
            'password' => Hash::make('38383833333')
        ]);
    }
}
