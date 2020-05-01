<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table='ventas';
    protected $primary='id';
    protected $fillable = [
        'serie_comprobante',
        'num_comprobante',
        'total_venta',
        'igv',
        'activo',
        'borrado',
        'created_at',
        'updated_at',
        'pago_id',
        'tipo_comprobante_id',
        'cliente_id',
        'empleado_id',
        'estado_venta_id',
    ];

    public function scopeBorrado($query)
    {
        return $query->where('borrado', '0');
    }

    public function pagos()
    {
        return $this->belongsTo(Pago::class, 'pago_id');
    }

    public function tipo_comprobantes()
    {
        return $this->belongsTo(Tipo_Comprobante::class, 'tipo_comprobante_id');
    }

    public function clientes()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function estado_ventas()
    {
        return $this->belongsTo(Estado_Venta::class, 'estado_venta_id');
    }

    public function empleados()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id');
    }
}
