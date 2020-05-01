<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado_Venta extends Model
{
    protected $table = 'estado_ventas';
    protected $fillable = ['estado', 'desc', 'activo', 'borrado', 'created_at', 'updated_at'];
    protected $guarded = ['id'];

    public function scopeBorrado($query)
    {
        return $query->where('borrado','0');
    }
}
