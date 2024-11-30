<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePracticaRequest;
use App\Http\Requests\UpdatePracticaRequest;
use App\Mail\EndModuleMail;
use App\Models\Modulo;
use App\Models\Practica;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class PracticaController extends Controller
{
    //
    public function index(){
        if(Auth::user()->hasRole('estudiante')){
            $practicas = Practica::where('user_id','=',Auth::user()->id)->get();
        }else{
            $practicas = Practica::get();
        }
        return view('practicas.index',compact('practicas'));
    }
    public function create(){
        $estudiantes = User::role('estudiante')->orderBy('lastname')->orderBy('name')->get();
        $modulos = Modulo::get();
        return view('practicas.create',compact('estudiantes','modulos'));
    }
    public function store(StorePracticaRequest $request){
        $practica = new  Practica();
        $practica->user_id = $request->estudiante;
        $practica->modulo_id = $request->modulo_id;
        $practica->docente = $request->docente;
        $practica->empresa = $request->empresa;
        $practica->fecha_inicio = $request->fecha_inicio;
        $practica->save();
        return Redirect::route('practicas.index');
    }
    public function edit($id){
        $practica = Practica::findOrFail($id);
        $user = User::find($id);
        $modulos = Modulo::get();
        $estudiantes = User::role('estudiante')->orderBy('lastname')->orderBy('name')->get();
        return view('practicas.edit',compact('practica','user','estudiantes','modulos'));
    }
    public function update(UpdatePracticaRequest $request,$id){
        $practica = Practica::find($id);
        $practica->docente = $request->docente;
        $practica->empresa = $request->empresa;
        $practica->fecha_inicio = $request->fecha_inicio;
        $practica->update();        
        return Redirect::route('practicas.index');
    }
    public function destroy($id){
        $practica = Practica::find($id);
        $practica->delete();
        return Redirect::route('practicas.index');
    }
    public function registrarFinal($id,Request $request){
        $practica = Practica::findOrFail($id);
        $this->check_days($practica);
        $practica->fecha_final = Carbon::now();
        $practica->terminado = true;
        $practica->update();
        $this->sendMail($practica);
        return Redirect::route('practicas.index');
    }
    public function sendMail($practica){      
        if(env('APP_ENV') === 'production'){
            Mail::to('bmaestro@idexperujapon.edu.pe')->send(new EndModuleMail($practica));
        }else{
            Mail::to('47152855@idexperujapon.edu.pe')->send(new EndModuleMail($practica));
        }
    }
    public function check_days($practica){
        $fecha = Carbon::parse($practica->fecha_inicio);
        $fecha->addDays(37);
        if ($fecha->gt(Carbon::now())){
            return Redirect::route('practicas.index')->with('error','No puedes finalizar la práctica antes de los 37 días');
        }
    }
}
