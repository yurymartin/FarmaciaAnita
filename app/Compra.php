<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $table='compras';
    protected $primary='id';
    protected $fillable = [
        'monto_total',
        'igv',
        'serie_comprobante',
        'num_comprobante',
        'activo',
        'borrado',
        'created_at',
        'updated_at',
        'proveedor_id',
        'estado_compra_id',
        'tipo_comprobante_id',
    ];

    public function scopeBorrado($query)
    {
        return $query->where('borrado', '0');
    }

    public function estado_compras()
    {
        return $this->belongsTo(Estado_Compra::class, 'estado_compra_id');
    }

    public function proveedores()
    {
        return $this->belongsTo(Proveedor::class, 'proveedor_id');
    }

    public function tipo_comprobantes()
    {
        return $this->belongsTo(Tipo_Comprobante::class, 'tipo_comprobante_id');
    }

}
