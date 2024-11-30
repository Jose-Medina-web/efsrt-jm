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
            "nombre"=> "Módulo 1: Gestión de soporte técnico y redes de comunicación.",
            "descripcion"=> "Este módulo es el primero de la carrera",
            'orden' => 1
        ]);

        Modulo::create([
            "nombre"=> "Módulo 2: Desarrollo y gestión de sistemas informáticos",
            "descripcion"=> "Este módulo es el segundo de la carrera",
            'orden' => 2
        ]);

        Modulo::create([
            "nombre"=> "Módulo 3: Arquitectura y proyectos TI ",
            "descripcion"=> "Este módulo es el tercero de la carrera",
            'orden' => 3
        ]);

    }
}
