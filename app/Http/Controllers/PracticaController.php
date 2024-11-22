<?php

namespace App\Http\Controllers;

use App\Models\Practica;
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
        return view('practicas.create');
    }
    public function store(Request $request){
        $practica = new  Practica();
        $practica->docente = $request->docente;
        $practica->empresa = $request->empresa;
        $practica->fecha_inicio = $request->fecha_inicio;
        $practica->fecha_final = $request->fecha_final;
        $practica->terminado = $request->terminado;
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
