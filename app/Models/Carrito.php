<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    use HasFactory;

    // Indicamos el nombre REAL de la tabla
    protected $table = "carrito";

    // Indicamos el nombre REAL de la clave primaria
    protected $primaryKey = "idCar";

    // Indicamos que el modelo no utiliza
    // los campos created_at y updated_at
    public $timestamps = false;

    protected $filleable = ["idCar","idUsu","estado","fechaCar"];


    public function encargos() {
        return $this->hasMany('App\Models\Encargo','idEnc','idCar');
    }

    public function usuario() {
        return $this->belongsTo('App\Models\User','idCar','idUsu')->first();
    }
}
