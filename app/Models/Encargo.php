<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encargo extends Model
{
    use HasFactory;

    // Indicamos el nombre REAL de la tabla
    protected $table = "encargo";

    // Indicamos el nombre REAL de la clave primaria
    protected $primaryKey = "idEnc";

    // Indicamos que el modelo no utiliza
    // los campos created_at y updated_at
    public $timestamps = false;

    protected $filleable = ["idEnc","idUsu","estiloEnc","numPerEnc",
                            "tamEnc","cantEnc","comEnc"];

        // FUCIONES

    /* public function usuario() {
        return $this->belongsTo("App\Models\Usuario","idUsu")->first();
    } */
}
