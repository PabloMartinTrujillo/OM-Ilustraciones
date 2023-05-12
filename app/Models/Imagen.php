<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    use HasFactory;

    // Indicamos el nombre REAL de la tabla
    protected $table = "imagen";

    // Indicamos el nombre REAL de la clave primaria
    protected $primaryKey = "idImg";

    // Indicamos que el modelo no utiliza
    // los campos created_at y updated_at
    public $timestamps = false;

    protected $filleable = ["idImg","nomImg","desImg","rutaImg"];

                // FUCIONES

    public function galeria() {
        return $this->belongsToMany(Galeria::class,'galeria_imagen','idImg','idGal')/* ->getResults()->all() */;

    }
}
