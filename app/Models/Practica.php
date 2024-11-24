<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Practica extends Model
{
    public function modulo(){
        return $this->belongsTo(Modulo::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
