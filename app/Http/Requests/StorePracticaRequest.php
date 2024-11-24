<?php

namespace App\Http\Requests;

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
                    if(isset($practica->id)){
                        $fail("Este modulo ya esta registrado");
                    }
                }
            ],
        ];
    }
}
