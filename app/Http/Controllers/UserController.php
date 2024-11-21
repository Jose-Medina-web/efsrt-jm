<?php

namespace App\Http\Controllers;

use App\Models\Promocione;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    //
    public function index(){
        $users = User::role('estudiante')->get();
        return view('users.index',compact('users'));
    }
    public function create(){
        $promociones = Promocione::get();
        return view('users.create',compact('promociones'));
    }
    public function store(Request $request){
        $user = new  User();
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->dni = $request->dni;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = encrypt($request->password);
        $user->save();
        $user->promociones()->sync($request->promocione_id);
        $user->assignRole('estudiante');
        return Redirect::route('users.index');
    }

    public function edit($id){
        $user = User::find($id);
        return view('users.edit',compact('user'));
    }
    
    public function update(Request $request,$id){
        
        $user = User::find($id);
        // dd($user);
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->dni = $request->dni;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->update();        
        return Redirect::route('users.index');
    }

    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        return Redirect::route('users.index');
    }
}
