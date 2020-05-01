<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Estado_VentaFormRequest extends FormRequest
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
            'estado' => 'required|max:450',
            'desc' => 'max:450',
        ];
    }
}
