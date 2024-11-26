<?php

namespace App\Http\Controllers;

use App\Models\Modulo;
use App\Models\Promocione;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    //
    public function index(){
        $users = User::role('estudiante')->get();
        $modulos = Modulo::get();
        return view('users.index',compact('users','modulos'));
    }
    public function create(){
        $promociones = Promocione::get();
        return view('users.create',compact('promociones'));
    }
    public function store(Request $request){
        $request->validate([
            "name"=>"required",
            "apellido"=>"required",
            "dni"=>"required",
            "phone"=>"required|min:9|max:9",
            "email"=>"required|email",
            "password"=>"required|min:8|confirmed",
            "promoción"=>"required",
        ]);
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
        return Redirect::route('users.index');
    }

    public function edit($id){
        $user = User::find($id);
        $promociones = Promocione::get();
        return view('users.edit',compact('user','promociones'));
    }
    
    public function update(Request $request,$id){
        $request->validate([
            "name"=>"required",
            "apellido"=>"required",
            "dni"=>"required",
            "phone"=>"required|min:9|max:9",
            "email"=>"required|email",
            "password"=>"confirmed",
            "promoción"=>"required",
        ]);
        $user = User::find($id);
        // dd($user);
        $user->name = $request->name;
        $user->lastname = $request->apellido;
        $user->dni = $request->dni;
        $user->phone = $request->phone;
        $user->email = $request->email;
        if(isset($request->password)){
            $user->password = $request->password;
        }
        
        $user->update();        
        return Redirect::route('users.index');
    }

    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        return Redirect::route('users.index');
    }
}
