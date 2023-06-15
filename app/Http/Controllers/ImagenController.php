<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use App\Models\Galeria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;

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
            "imagen" => ["required", "file"],
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
        $req->file('imagen')->storeAs('/public/img', $nombreArchivo); // Guardo la imagen

        $pathImg = base_path("storage/app/public/img/".$nombreArchivo);

        $imgResized = Image::make($pathImg);
        $imgResized->resize(null, 300, function($constraint) { // Redimensiona la imagen
            $constraint->aspectRatio(); // almacenada anteriormente a 300 de altura,
            $constraint->upsize();  //  la anchura se ajusta para no deformar la imagen
        });
        $imgResized->save($pathImg);    // Sobreescribo la imagen guardada con la redimensionada

        $imagenes = Galeria::find($req->input("idGal"))->getImagenes()->getResults()->all();
        $ruta = "storage/img/".$nombreArchivo;

        if(imagenGuardada($ruta, $imagenes)) {
            Storage::delete("public/img/". $nombreArchivo);
        } else {
            $imagen = new Imagen;
            $imagen->rutaImg = $nombreArchivo;

            $imagen->save();
            $imagen->galeria()->attach($req->input("idGal"));
        }
        
        return redirect()->route("galeria.modificar", $req->input("idGal"));
    }

    public function borrar(Request $req, $idGal ,$idImg) {
        $imagen = Imagen::find($idImg);
        if (DB::table("galeria_imagen")->where("idImg", "=", $idImg)->get()->count() > 1) {
            $imagen->galeria()->detach($idGal);
        } else {
            Storage::delete("public/img/". $imagen->rutaImg);
            $imagen->delete();
        }
        // Si la imagen que se quiere borrar está en otras galerías, la imagen no
        // se borra del almacenamiento ni de la base de datos, ya que es necesaria en otras galerías

        return redirect(route("galeria.modificar",$idGal));
    }

    public function addAOtraGaleriaView (Request $req, $idGal, $idImg) {
        return view("imagen.addAOtraGaleria", ["imagen" => Imagen::find($idImg), "idGal" => $idGal]);
    }

    public function addAOtraGaleria (Request $req, $idImg, $idGal) {
        Imagen::find($idImg)->galeria()->attach($req->input("galeria"));
        return redirect(route("galeria.modificar",$idGal));
    }
}
