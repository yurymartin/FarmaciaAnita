<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VentaFormRequest extends FormRequest
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
            'precio_venta' => 'required',
            'descuento' => 'required',
            'producto_id' => 'required',
            'tipo_comprobante_id' => 'required',
            'pago_id' => 'required',
            'cliente_id' => 'required',
            'estado_venta_id' => 'required',
        ];
    }
}
