<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    public function practicas(){
        return $this->hasMany(Practica::class);
    }
}
