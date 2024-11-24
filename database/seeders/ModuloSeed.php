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
            "nombre"=> "Módulo 1",
            "descripcion"=> "Este módulo es el primero de la carrera"
        ]);

        Modulo::create([
            "nombre"=> "Módulo 2",
            "descripcion"=> "Este módulo es el segundo de la carrera"
        ]);

        Modulo::create([
            "nombre"=> "Módulo 3",
            "descripcion"=> "Este módulo es el tercero de la carrera"
        ]);

    }
}
