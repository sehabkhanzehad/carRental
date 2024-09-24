<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::create([
            "name" => "Sk Zehad",
            "email" => "sehabkhanzehad@yahoo.com",
            "password" => bcrypt('Pa$$w0rd!'),
            "role" => "admin",
        ]);
    }
}
