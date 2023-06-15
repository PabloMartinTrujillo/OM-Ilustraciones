<?php

namespace App\Http\Controllers;

use App\Models\Galeria;
use Illuminate\Http\Request;

class GaleriaController extends Controller
{
    public function mostrar(Request $req) {
        return view("galeria.main", ["galerias" => Galeria::all()]);
    }

    public function formCrear(Request $req) {
        return view("galeria.formCrear");
    }

    public function creaGaleria(Request $req) {
        $req->validate([
            "nomGal" => ["string","required"],
            "desGal" => ["string","required"],]);

        $galeria = new Galeria;
        $galeria->nomGal = $req->input("nomGal");
        $galeria->desGal = $req->input("desGal");
        $galeria->save();
        return redirect()->route("galeria.mostrar");
    }

    public function modificar(Request $req, $idGal) {
        return view("galeria.modificar", ["galeria" => Galeria::find($idGal)]);
    }

    public function borrar(Request $req, $idGal) {
        $encargo = Galeria::find($idGal);
        $encargo->delete();
        return redirect()->route("galeria.mostrar");
    }

    public function ver(Request $req, $idGal) {
        return view("galeria.ver", ["galeria" => Galeria::find($idGal)]);
    }
}
