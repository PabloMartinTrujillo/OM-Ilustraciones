<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function perfilView (Request $req) {
        $usuarios = User::paginate(10);
        if($req->has("email")) {
            $req->validate([
                'email' => ['required', 'string'],
            ]);

            if (User::where("email","like","%{$req->input('email')}%")->get()->count()==0) {
                $usuarios = User::paginate(10);
            } else {
                $usuarios = User::where("email","like","%{$req->input('email')}%")->paginate(10);
            }
        }
        return view("usuario.perfil", ["usuarios" => $usuarios, "usuario" => Auth::user()]);
    }

    public function modificarUsu (Request $req, $idUsu) {
        return view("usuario.modificar", ["usuario" => User::find($idUsu)]);
    }

    public function guardarMod(Request $req) {
        // dd($req);
        $req->validate([
            'tipo' => ['string'],
            'nombre' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255','unique:users'],
        ]);

        /* Hacer que se guarde bien y tal */

        $usuario = User::find($req->input("idUsu"));

        $usuario->tipoUsu = $req->input("tipo");
        if(trim($req->input("nombre")) != null) {
            $usuario->nomUsu = trim($req->input("nombre"));
        }
        if(trim($req->input("email")) != null) {
            $usuario->email = trim($req->input("email"));
        }
        if(trim($req->input("password")) != null) {
            $usuario->password = Hash::make($req->input("password"));
        }

        $usuario->save();
        return redirect(route("usuario.perfil"));
    }

    public function borrar(Request $req, $idUsu) {
        $usuario = User::find($idUsu);
        $usuario->delete();
        return redirect(route("usuario.perfil"));
    }
    
}
