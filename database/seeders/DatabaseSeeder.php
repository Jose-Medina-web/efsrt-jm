<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        $this->call(PromocioneSeed::class);
        $this->call(PermissionSeed::class);
        $this->call(ModuloSeed::class);
        $user1 = User::create([
            'name'=>'Jose Antonio',
            'lastname' =>'Medina Muñoz',
            'dni'=>'45874587',
            'email'=>'pepito@gmail.com',
            'phone'=>'98745125',
            'password'=> bcrypt('12345678')
        ]);
        $user2 = User::create([
            'name'=>'Kevin MasNaa',
            'lastname' =>'Yoplac Muñoz',
            'dni'=>'73661887',
            'email'=>'kevin@gmail.com',
            'phone'=>'938543502',
            'password'=> bcrypt('12345678')
        ]);
        $user1->promociones()->attach(1);
        $user2->promociones()->attach(1);
        $user_admin = User::create([
            'name'=>'Betty Aurora',
            'lastname' =>'Del Maestro Chambergo',
            'dni'=>'12345678',
            'email'=>'bmaestro@idexperujapon.edu.pe',
            'phone'=>'987654321',
            'password'=> bcrypt('12345678')
        ]);
        $user_admin->assignRole('admin');
        $user1->assignRole('estudiante');
        $user2->assignRole('estudiante');
    }
}
