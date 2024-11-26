<?php

namespace App\Http\Controllers;

use App\Models\Promocione;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\TryCatch;

class PromocioneController extends Controller
{
    //
    public function index()
    {
        $promociones = Promocione::get();
        return view('promociones.index', compact('promociones'));
    }
    public function create()
    {
        return view('promociones.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            "nombre" => "required|unique:promociones,nombre|max:4|min:4"
        ]);

        try {
            $promocione = new  Promocione();
            $promocione->nombre = $request->nombre;
            $promocione->save();
        } catch (\Throwable $th) {
            return Redirect::route('promociones.index')->with('error','
            No se puedo guardar la promoción '.$promocione->nombre);
        }

        return Redirect::route('promociones.index')->with('info','Se guardó correctamente la promoción '.$promocione->nombre);
    }
    public function edit($id)
    {
        $promocione = Promocione::find($id);
        return view('promociones.edit', compact('promocione'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            "nombre" => "required|unique:promociones,nombre|max:4|min:4"
        ]);
        try {
            $promocione = Promocione::findOrFail($id);
            $promocione->nombre = $request->nombre;
            $promocione->update();
        } catch (\Throwable $th) {
            return Redirect::route('promociones.index')->with('error', 'No se puede eliminnar la promoción ' . $promocione->nombre);
        }
        return Redirect::route('promociones.index')->with('info', 'Se actualizó la promoción ' . $promocione->nombre . ' correctamente');
    }
    public function destroy($id)
    {
        try {
            $promocione = Promocione::find($id);
            $promocione->delete();
        } catch (\Throwable $th) {
            return Redirect::route('promociones.index')->with('error', 'No se puede eliminnar la promoción ' . $promocione->nombre);
        }
        return Redirect::route('promociones.index')->with('info', 'La promoción '.$promocione->nombre.' fue eliminada exitosamente');
    }
}
