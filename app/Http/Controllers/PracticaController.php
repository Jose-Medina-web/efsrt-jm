<?php

namespace App\Http\Controllers;

use App\Models\Modulo;
use App\Models\Practica;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PracticaController extends Controller
{
    //
    public function index(){
        $practicas = Practica::get();
        return view('practicas.index',compact('practicas'));
    }
    public function create(){
        $estudiantes = User::role('estudiante')->orderBy('lastname')->orderBy('name')->get();
        $modulos = Modulo::get();
        return view('practicas.create',compact('estudiantes','modulos'));
    }
    public function store(Request $request){
        $practica = new  Practica();
        $practica->user_id = $request->user_id;
        $practica->modulo_id = $request->modulo_id;
        $practica->docente = $request->docente;
        $practica->empresa = $request->empresa;
        $practica->fecha_inicio = $request->fecha_inicio;
        $practica->fecha_final = $request->fecha_final;
        $practica->save();
        return Redirect::route('practicas.index');
    }
    public function edit($id){
        $practica = Practica::find($id);
        return view('practicas.edit',compact('practica','user'));
    }
    public function update(Request $request,$id){
        $practica = Practica::find($id);
        $practica->docente = $request->docente;
        $practica->empresa = $request->empresa;
        $practica->fecha_inicio = $request->fecha_inicio;
        $practica->fecha_final = $request->fecha_final;
        $practica->terminado = $request->terminado;
        $practica->update();        
        return Redirect::route('practicas.index');
    }
    public function destroy($id){
        $practica = Practica::find($id);
        $practica->delete();
        return Redirect::route('practicas.index');
    }
}
