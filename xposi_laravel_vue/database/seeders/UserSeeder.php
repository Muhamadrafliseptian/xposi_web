<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "nama" => "Administrator",
            "email" => "admin@gmail.com",
            "password" => bcrypt("password"),
            "created_by" => 0,
            "status" => 1
        ]);
    }
}
