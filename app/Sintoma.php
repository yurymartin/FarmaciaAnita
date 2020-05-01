<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sintoma extends Model
{
    protected $table = 'sintomas';
    protected $fillable = ['nombre', 'desc', 'activo', 'borrado', 'created_at', 'updated_at'];
    protected $guarded = ['id'];

    public function scopeBorrado($query)
    {
        return $query->where('borrado', '0');
    }
}
