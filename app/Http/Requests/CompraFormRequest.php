<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompraFormRequest extends FormRequest
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
            'cantidad' => 'required',
            'precio_compra' => 'required',
            'precio_venta' => 'required',
            'producto_id' => 'required',
            'tipo_comprobante_id' => 'required',
            'serie_comprobante' => 'max:7',
            'num_comprobante' =>'required|max:10'
        ];
    }
}
