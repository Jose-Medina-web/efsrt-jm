<?php

namespace Database\Seeders;

use App\Models\Modulo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModuloSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Modulo::create([
            "nombre"=> "Módulo 1"
        ]);

        Modulo::create([
            "nombre"=> "Módulo 2"
        ]);

        Modulo::create([
            "nombre"=> "Módulo 3"
        ]);

    }
}
