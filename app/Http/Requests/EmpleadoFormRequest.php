<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpleadoFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'dni' => 'required|max:8',
            'nombres' => 'required|max:45',
            'apellidos' => 'required|max:45',
            'direccion' => 'max:45',
            'genero' => 'required|max:1',
            'sueldo' => 'required',
        ];
    }
}
