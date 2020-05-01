<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class Empleado extends Model
{
    protected $table = 'empleados';
    protected $fillable = ['activo','foto','sueldo','telefono','borrado', 'created_at', 'updated_at','persona_id','especialidad_id'];
    protected $guarded = ['id'];

    public static function setFoto($foto, $actual = false)
    {
        if ($foto) {
            if ($actual) {
                Storage::disk('public')->delete("img/personas/$actual");
            }
            $imageName = Str::random(20) . '.jpg';
            $img = Image::make($foto)->encode('jpg', 75);
            $img->resize(530, 470, function ($constraint) {
                $constraint->upsize();
            });
            Storage::disk('public')->put("img/personas/$imageName", $img->stream());
            return $imageName;
        } else {
            return false;
        }
    }

    public function scopeBorrado($query)
    {
        return $query->where('borrado', '0');
    }

    public function personas()
    {
        return $this->belongsTo('App\Persona', 'persona_id');
    }

    public function especialidades()
    {
        return $this->belongsTo('App\Especialidad', 'especialidad_id');
    }
}
