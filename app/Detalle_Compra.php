<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle_Compra extends Model
{
    protected $table = 'detalle_compras';
    protected $primary = 'id';
    protected $fillable = [
        'cantidad',
        'precio_compra',
        'precio_venta',
        'created_at',
        'updated_at',
        'compra_id',
        'producto_id'
    ];

    public function compras()
    {
        return $this->belongsTo(Compra::class, 'compra_id');
    }

    public function productos()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }
}
