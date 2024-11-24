<?php

namespace App\Http\Requests;

use App\Models\Modulo;
use App\Models\Practica;
use Illuminate\Foundation\Http\FormRequest;

class StorePracticaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'estudiante' => 'required',
            'docente'=>'required',
            'empresa'=>'required',
            'fecha_inicio'=>'required|date',
            'modulo_id'=>[
                'required',
                function($attribute, $value, $fail) {
                    $estudiante = $this->input('estudiante');
                    $practica = Practica::where('user_id','=',$estudiante)->where('modulo_id','=',$value)->first();
                    $modulo = Modulo::findOrFail($value);
                    if ($modulo->orden != 1){
                    $order = $modulo->orden - 1;
                    $modulo_previo = Modulo::where('orden','=',$order)->first();
                    $practica_exist = Practica::where('user_id','=',$estudiante)->where('modulo_id','=',$modulo_previo->id)
                    ->first();
                        if(!isset($practica_exist->id)){
                            $fail("Debes de completar el modulo anterior");
                        }
                    }
                    if(isset($practica->id)){
                        $fail("Este módulo ya está registrado");
                    }
                }
            ],
        ];
    }
}
