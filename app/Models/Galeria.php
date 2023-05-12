<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeria extends Model
{
    use HasFactory;

    // Indicamos el nombre REAL de la tabla
    protected $table = "galeria";

    // Indicamos el nombre REAL de la clave primaria
    protected $primaryKey = "idGal";

    // Indicamos que el modelo no utiliza
    // los campos created_at y updated_at
    public $timestamps = false;

    protected $filleable = ["idGal","nomGal","desGal",];

                // FUCIONES

    public function getImagenes() {
        return $this->belongsToMany(Imagen::class,'galeria_imagen','idGal','idImg')/* ->getResults()->all() */;
    }
}
