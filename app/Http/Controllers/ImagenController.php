<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use App\Models\Galeria;
use Illuminate\Http\Request;
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

        /* function imagenGuardada($img,$conjunto) { // Compruebo si la imagen ya ha sido almacenada
            foreach($conjunto as $imagen) {
                if(hash_file('sha256',$img) === hash_file('sha256',"storage/img/".$imagen->rutaImg)) {
                    return true;
                }
            }
            return false;
        } */

        // $imagenes = Galeria::find($req->input("idGal"))->getImagenes()->getResults()->all();

        // dd(imagenGuardada($req->file("imagen"),$imagenes));

        /* if(imagenGuardada($req->file("imagen"),$imagenes)) {

        } */

        $nombreArchivo = time().".".$req->file('imagen')->getClientOriginalExtension();
        $req->file('imagen')->storeAs('/public/img', $nombreArchivo);

        /* $imgResized = Image::make("storage/img/" . $imagenes[0]->rutaImg);
        $imgResized->resize(500, 500, function($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        $imgResized->save(public_path("img\'".$nombreArchivo));
        dd($imgResized); */

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
        $imagen->delete();

        return redirect(route("galeria.modificar",$idGal));
    }
}
