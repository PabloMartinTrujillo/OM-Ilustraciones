<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use App\Models\Galeria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{
    public function addImgForm(Request $req, $idGal)
    {
        return view("imagen.addImg", ["galeria" => Galeria::find($idGal)]);
    }

    public function guardar(Request $req)
    {

        $req->validate([
            "idGal" => ["string", "required"],
            "nomImg" => ["string", "required"],
            "desImg" => ["string", "nullable"],
            "imagen" => ["required", "file"]
        ]);

        function imagenGuardada($img,$conjunto) { // Compruebo si la imagen ya ha sido almacenada
            foreach($conjunto as $imagen) {
                if(hash_file('sha256',$img) === hash_file('sha256',"storage/img/".$imagen->rutaImg)) {
                    return true;
                }
            }
            return false;
        }

        $nombreArchivo = time().".".$req->file('imagen')->getClientOriginalExtension();
        $req->file('imagen')->storeAs('/public/img', $nombreArchivo);

        $imgResized = Image::make("storage/img/" . $nombreArchivo);
        $imgResized->resize(null, 300, function($constraint) { // Redimensiona la imagen
            $constraint->aspectRatio(); // almacenada anteriormente a 300 de altura,
            $constraint->upsize();  //  la anchura se ajusta para no deformar la imagen
        });
        $imgResized->save();    // Sobreescribo la imagen guardada con la redimensionada

        $imagen = new Imagen;
        $imagen->nomImg = $req->input("nomImg");
        $imagen->desImg = $req->input("desImg");
        $imagen->rutaImg = $nombreArchivo;

        $imagen->save();
        $imagen->galeria()->attach($req->input("idGal"));
        return redirect()->route("galeria.modificar", $req->input("idGal"));
    }

    public function borrar(Request $req, $idGal ,$idImg) {
        $imagen = Imagen::find($idImg);
        Storage::delete("storage/img/".$imagen->rutaImg);
        $imagen->delete();

        return redirect(route("galeria.modificar",$idGal));
    }

    /* public function resizeAll(Request $req) {
        $imagenes = Imagen::all();

        foreach($imagenes as $imagen) {
            $imgResize = Image::make("storage/img/".$imagen->rutaImg);

            $imgResize->resize(null, 300, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            $imgResize->save();
        }

        return redirect(route("galeria.mostrar"));
    } */
}
