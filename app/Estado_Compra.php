<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado_Compra extends Model
{
    protected $table = 'estado_compras';
    protected $fillable = ['estado', 'descripcion', 'activo', 'borrado', 'created_at', 'updated_at'];
    protected $guarded = ['id'];

    public function scopeBorrado($query)
    {
        return $query->where('borrado','0');
    }
    
}
