<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrito;

class CarritoController extends Controller
{
    public function mostrar(Request $req) {
        $carrito = Carrito::where("idUsu","=",auth()->user()->idUsu)->where("estado","=","comprando")->first();
        return view("carrito", ["carrito" => $carrito]);
    }

    public function encargar(Request $req) {
        $carrito = Carrito::find($req->input("idCar"));
        $carrito->estado = "pendiente";
        $carrito->save();

        if($req->has("carritoView")) {
            return redirect()->route("carrito");
        }
        return redirect()->route("encargo.encargos");
    }

    public function aprobar(Request $req) {
        $carrito = Carrito::find($req->input("idCar"));
        $carrito->estado = "aprobado";
        $carrito->save();

        return redirect()->route("encargo.encargos");
    }

    public function rechazar(Request $req) {
        $carrito = Carrito::find($req->input("idCar"));
        $carrito->delete();

        return redirect()->route("encargo.encargos");
    }
}
