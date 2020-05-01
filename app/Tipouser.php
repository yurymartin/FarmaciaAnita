<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipouser extends Model
{
    protected $table = 'tipousers';
    protected $fillable = ['tipo', 'desc', 'activo', 'borrado', 'created_at', 'updated_at'];
    protected $guarded = ['id'];

    public function scopeBorrado($query)
    {
        return $query->where('borrado','0');
    }
}
