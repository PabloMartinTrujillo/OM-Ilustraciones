<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Encargo;
use App\Models\Carrito;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EncargoController extends Controller
{
    
    public function encargos(Request $req) {
        if(auth()->user()->tipoUsu == "admin") {
            return view("encargo.main", ["carritos" => Carrito::where('estado','=',"pendiente")->paginate(2)]);
        } else {
            return view("encargo.main", ["carritos" => Carrito::where('idUsu','=',auth()->user()->idUsu)->orderByDesc('fechaCar')->get()->all()]);
        }
    }

    public function formCrear(Request $req) {
        $diasDisabled = [];
        foreach(Encargo::distinct()->pluck("fecha_entrega") as $fecha) {
            if(Encargo::where("fecha_entrega","=",$fecha)->get()->count() >= 6) {
                $diasDisabled[] = $fecha;
            }
        }
        
        return view("encargo.crear", ["diasDisabled" => json_encode($diasDisabled)]);
    }

    public function compraEnc(Request $req) {
        
        $req->validate([
            "imagen" => ["required", "file"],
            "estilo" => ["string", "required"],
            "numPersonas" => ["integer", "required","max:51"],
            "tamano" => ["string", "required"],
            "cantidad" => ["integer", "required","max:51"],
            "fechaEntrega" => ["string", "required"],
        ]);

        $nombreArchivo = time().".".$req->file('imagen')->getClientOriginalExtension();
        $req->file('imagen')->storeAs('/public/img', $nombreArchivo); // Guardo la imagen
        $pathImg = base_path("storage/app/public/img/".$nombreArchivo);
        $imgResized = Image::make($pathImg);
        $imgResized->resize(null, 300, function($constraint) { // Redimensiona la imagen
            $constraint->aspectRatio(); // almacenada anteriormente a 300 de altura,
            $constraint->upsize();  //  la anchura se ajusta para no deformar la imagen
        });
        $imgResized->save($pathImg);

        if($req->has("addToCart")) {
            if (DB::table("carrito")->where("idUsu","=",auth()->user()->idUsu)->where("estado","=","comprando")->get()->count() == 0) {
                $carrito = new Carrito;
                $carrito->idUsu = auth()->user()->idUsu;
                $carrito->estado = "comprando";
                $carrito->fechaCar = Carbon::createFromFormat('Y-m-d H:i:s', Carbon::now()->toDateTimeString())->format('d/m/Y H:i:s');
                $carrito->save();
            } else {
                $carrito = Carrito::where("idUsu","=",auth()->user()->idUsu)->where("estado","=","comprando")->get()->first();
            }
        } else if($req->has("makeOrder")) {
            $carrito = new Carrito;
            $carrito->idUsu = auth()->user()->idUsu;
            $carrito->estado = "pendiente";
            $carrito->fechaCar = Carbon::createFromFormat('Y-m-d H:i:s', Carbon::now()->toDateTimeString())->format('d/m/Y H:i:s');
            $carrito->save();
        }

        $encargo = new Encargo;
        $encargo->idCar = $carrito->idCar;
        $encargo->imagenEnc = $nombreArchivo;
        $encargo->estiloEnc = $req->input("estilo");
        $encargo->numPerEnc = $req->input("numPersonas");
        $encargo->tamEnc = $req->input("tamano");
        $encargo->cantEnc = $req->input("cantidad");
        if($req->input("comentario") == null) {
            $encargo->comEnc = "-";
        } else {
            $encargo->comEnc = $req->input("comentario");
        }
        $precio = 0;
        switch($req->input("estilo")) {
            case "todoColor":
                switch($req->input("tamano")) {
                    case "digital":
                        $precio+=20;
                        break;
                    case "A3":
                        $precio+=35;
                        break;
                    case "A4":
                        $precio+=30;
                        break;
                    case "A5":
                        $precio+=25;
                        break;
                }
                break;
            case "contornoNegroColor":
                switch($req->input("tamano")) {
                    case "digital":
                        $precio+=20;
                        break;
                    case "A3":
                        $precio+=35;
                        break;
                    case "A4":
                        $precio+=30;
                        break;
                    case "A5":
                        $precio+=25;
                        break;
                }
                break;
            case "lineaSimple":
                switch($req->input("tamano")) {
                    case "digital":
                        $precio+=10;
                        break;
                    case "A3":
                        $precio+=25;
                        break;
                    case "A4":
                        $precio+=20;
                        break;
                    case "A5":
                        $precio+=15;
                        break;
                }
                break;
            case "minimalista":
                switch($req->input("tamano")) {
                    case "digital":
                        $precio+=10;
                        break;
                    case "A3":
                        $precio+=25;
                        break;
                    case "A4":
                        $precio+=20;
                        break;
                    case "A5":
                        $precio+=15;
                        break;
                }
                break;
        }
        $precio += (5*($req->input("numPersonas")-1));
        $precio += ($req->input("cantidad")-1);

        $encargo->precio = $precio;
        $encargo->fecha_encargo = Carbon::createFromFormat('Y-m-d H:i:s', Carbon::now()->toDateTimeString())->format('d/m/Y H:i:s');
        $encargo->fecha_entrega = $req->input("fechaEntrega");
        $encargo->save();

        return redirect()->route("encargo.encargos");
    }

    public function eliminar(Request $req) {
        
        $encargo = Encargo::find($req->input("idEnc"));

        if(Encargo::where("idCar","=",$encargo->idCar)->get()->count() > 1) {
            Storage::delete("public/img/". $encargo->imagenEnc);
            $encargo->delete();
        }
        else {
            Storage::delete("public/img/". $encargo->imagenEnc);
            $carrito = Carrito::find($encargo->idCar);
            $carrito->delete();
        }

        if($req->has("rutaCarrito")) {
            return redirect()->route("carrito");
        }

        return redirect()->route("encargo.encargos");
    }
}
