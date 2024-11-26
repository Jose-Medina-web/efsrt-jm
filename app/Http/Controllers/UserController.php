<?php

namespace App\Http\Controllers;

use App\Models\Modulo;
use App\Models\Promocione;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::role('estudiante')->get();
        $modulos = Modulo::get();
        return view('users.index', compact('users', 'modulos'));
    }
    public function create()
    {
        $promociones = Promocione::get();
        return view('users.create', compact('promociones'));
    }
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "apellido" => "required",
            "dni" => "required",
            "phone" => "required|min:9|max:9",
            "email" => "required|email",
            "password" => "required|min:8|confirmed",
            "promoción" => "required",
        ]);
        try {
            $user = new  User();
            $user->name = $request->name;
            $user->lastname = $request->apellido;
            $user->dni = $request->dni;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->password = encrypt($request->password);
            $user->save();
            $user->promociones()->sync($request->promoción);
            $user->assignRole('estudiante');
        } catch (\Throwable $th) {
            //throw $th;
            return Redirect::route('users.index')->with('error', 'Error al crear el usuario');
        }
        return Redirect::route('users.index')->with('info', 'Usuario creado con éxito');
    }

    public function edit($id)
    {
        try {
            $user = User::findOrFail($id);
            $promociones = Promocione::get();
        } catch (\Throwable $th) {
            return Redirect::route('users.index')->with('error', 'Error al editar el usuario');
        }
        return view('users.edit', compact('user', 'promociones'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "name" => "required",
            "apellido" => "required",
            "dni" => "required",
            "phone" => "required|min:9|max:9",
            "email" => "required|email",
            "password" => "confirmed",
            "promoción" => "required",
        ]);
        try {
            $user = User::findOrFail($id);
            $user->name = $request->name;
            $user->lastname = $request->apellido;
            $user->dni = $request->dni;
            $user->phone = $request->phone;
            $user->email = $request->email;
            if (isset($request->password)) {
                $user->password = $request->password;
            }
            $user->update();
        } catch (\Throwable $th) {
            return Redirect::route('users.index')->with('error', 'Error al actualizar el usuario');
        }
        return Redirect::route('users.index')->with('info', 'Usuario actualizado con éxito');
    }

    public function destroy($id)
    {
        try {
            DB::transaction();
            $user = User::findOrFail($id);
            $user->delete();
            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return Redirect::route('users.index')->with('error', 'Error al eliminar el usuario');
        }
        return Redirect::route('users.index')->with('info', 'Usuario eliminado con éxito');
    }
}
