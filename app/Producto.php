<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class Producto extends Model
{
    protected $table = 'productos';
    protected $fillable = ['codigo', 'nom', 'desc', 'nom_generico', 'imagen', 'stock', 'fec_cad','activo', 'borrado', 'created_at', 'updated_at'];
    protected $guarded = ['id'];

    public static function setImagen($imagen, $actual = false)
    {
        if ($imagen) {
            if ($actual) {
                Storage::disk('public')->delete("img/productos/$actual");
            }
            $imageName = Str::random(20) . '.jpg';
            $img = Image::make($imagen)->encode('jpg', 75);
            $img->resize(530, 470, function ($constraint) {
                $constraint->upsize();
            });
            Storage::disk('public')->put("img/productos/$imageName", $img->stream());
            return $imageName;
        } else {
            return false;
        }
    }

    public function scopeBorrado($query)
    {
        return $query->where('borrado', '0');
    }

    public function tipo_producto()
    {
        return $this->belongsTo('App\Tipo_Producto', 'tipo_id');
    }

    public function ubicacion()
    {
        return $this->belongsTo('App\Ubicacion', 'ubicacion_id');
    }
}
