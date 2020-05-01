<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_Producto extends Model
{
    protected $table = 'tipo_productos';
    protected $fillable = ['nom', 'desc', 'activo', 'borrado', 'created_at', 'updated_at'];
    protected $guarded = ['id'];

    public function scopeBorrado($query)
    {
        return $query->where('borrado','0');
    }
}
