<?php

namespace App\Http\Controllers;

use App\Models\Promocione;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PromocioneController extends Controller
{
    //
    public function index(){
        $promociones = Promocione::get();
        return view('promociones.index',compact('promociones'));
    }
    public function create(){
        return view('promociones.create');
    }
    public function store(Request $request){
        $request->validate([
            "nombre"=>"required|unique:promociones,nombre|max:4|min:4"
        ]);
        $promocione = new  Promocione();
        $promocione->nombre = $request->nombre;
        $promocione->save();
        return Redirect::route('promociones.index');
    }
    public function edit($id){
        $promocione = Promocione::find($id);
        return view('promociones.edit',compact('promocione'));
    }
    public function update(Request $request,$id){
        $request->validate([
            "nombre"=>"required|unique:promociones,nombre|max:4|min:4"
        ]);
        $promocione = Promocione::find($id);
        $promocione->nombre = $request->nombre;
        $promocione->update();        
        return Redirect::route('promociones.index');
    }
    public function destroy($id){
        $promocione = Promocione::find($id);
        $promocione->delete();
        return Redirect::route('promociones.index');
    }
}
