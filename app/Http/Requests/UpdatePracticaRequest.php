<?php

namespace App\Http\Requests;

use App\Models\Modulo;
use App\Models\Practica;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePracticaRequest extends FormRequest
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
            'docente'=>'required',
            'empresa'=>'required',
            'fecha_inicio'=>'required|date'
        ];
    }
}
