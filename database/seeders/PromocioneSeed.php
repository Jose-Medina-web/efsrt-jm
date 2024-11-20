<?php

namespace Database\Seeders;

use App\Models\Promocione;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PromocioneSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Promocione::create([
            'nombre'=>'2020'
        ]);
        Promocione::create([
            'nombre'=>'2021'
        ]);
        Promocione::create([
            'nombre'=>'2022'
        ]);
        Promocione::create([
            'nombre'=>'2023'
        ]);
    }
}
