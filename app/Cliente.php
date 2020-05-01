<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $fillable = ['activo', 'borrado', 'created_at', 'updated_at'];
    protected $guarded = ['id'];

    public function scopeBorrado($query)
    {
        return $query->where('borrado', '0');
    }

    public function personas()
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }
}
