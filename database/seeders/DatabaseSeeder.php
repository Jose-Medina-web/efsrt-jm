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
        // User::factory(10)->create();

        User::create([
            'name'=>'Jose Antonio',
            'lastname' =>'Medina Muñoz',
            'dni'=>'45874587',
            'email'=>'pepito@gmail.com',
            'phone'=>'98745125',
            'password'=> bcrypt('12345678')
        ]);
        User::create([
            'name'=>'Kevin MasNaa',
            'lastname' =>'Yoplac Muñoz',
            'dni'=>'73661887',
            'email'=>'kevin@gmail.com',
            'phone'=>'938543502',
            'password'=> bcrypt('12345678')
        ]);
    }
}
