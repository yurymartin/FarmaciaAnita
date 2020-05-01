<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    protected $table = 'detalle_ventas';
    protected $primary = 'id';
    protected $fillable = [
        'cantidad',
        'precio_venta',
        'monto_total',
        'activo',
        'borrado',
        'created_at',
        'updated_at',
        'venta_id',
        'producto_id'
    ];

    public function vemtas()
    {
        return $this->belongsTo(Venta::class, 'venta_id');
    }

    public function productos()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }
}
