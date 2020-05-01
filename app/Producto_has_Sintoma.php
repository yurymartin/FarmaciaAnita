<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto_has_Sintoma extends Model
{
    protected $table = 'productos_sintomas';
    protected $fillable = ['intensidad', 'producto_id', 'sintoma_id'];
    protected $guarded = ['id'];

    public function productos()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }

    public function sintomas()
    {
        return $this->belongsTo(Sintoma::class, 'sintoma_id');
    }
}
