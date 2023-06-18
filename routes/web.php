<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GaleriaController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\EncargoController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\IdiomaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/* Route::get('/pruebas', function () {
    return view('pruebas');
})->name("pruebas"); */

Route::get('lang/{idioma}', function ($idioma) {
    session()->put('locale', $idioma);
    return redirect()->back();
});

Route::get('/', function () {
    return view('main');
})->name("main");

Route::get('/carrito', [CarritoController::class, "mostrar"])->name("carrito");

Route::group(["prefix" => "galeria", "as" => "galeria.", /* "middleware" => ["auth"] */], function() 
{
    Route::get("/", [GaleriaController::class, "mostrar"])->name("mostrar");
    Route::get("/crear", [GaleriaController::class, "formCrear"])->middleware(["adminUser"])->name("formCrear");
    Route::post("/creaGaleria", [GaleriaController::class, "creaGaleria"])->name("creaGaleria");
    Route::get("/modificar/{idGal}", [GaleriaController::class, "modificar"])->middleware(["adminUser"])->name("modificar");
    Route::get("/ver/{idGal}", [GaleriaController::class, "ver"])->name("ver");
    Route::post("/borrar/{idGal}", [GaleriaController::class, "borrar"])->middleware(["adminUser"])->name("borrar") ;
});

Route::group(["prefix" => "imagen", "as" => "imagen.",], function() 
{
    Route::get("/{idGal}/add", [ImagenController::class, "addImgForm"])->middleware(["adminUser"])->name("addImg");
    Route::post("/guardar", [ImagenController::class, "guardar"])->name("guardar");
    Route::post("{idGal}/borrar/{idImg}", [ImagenController::class, "borrar"])->middleware(["adminUser"])->name("borrar") ;
    Route::get("{idGal}/addAOtraGaleria/{idImg}", [ImagenController::class, "addAOtraGaleriaView"])->middleware(["adminUser"])->name("addAOtraGaleriaView") ;
    Route::post("addAOtraGaleria/{idImg}/{idGal}", [ImagenController::class, "addAOtraGaleria"])->middleware(["adminUser"])->name("addAOtraGaleria") ;
});

Route::group(["prefix" => "usuario", "as" => "usuario.", "middleware" => ["auth"]], function() 
{
    Route::get("/", [UsuarioController::class, "perfilView"])->name("perfil");
    Route::post("/", [UsuarioController::class, "perfilView"])->name("perfil");
    Route::get("/modificar/{idUsu}", [UsuarioController::class, "modificarUsu"])->middleware(["adminUser"])->name("modificar");
    Route::post("/modificar", [UsuarioController::class, "guardarMod"])->middleware(["adminUser"])->name("guardarMod");
    Route::post("/borrar/{idUsu}", [UsuarioController::class, "borrar"])->middleware(["adminUser"])->name("borrar") ;
});

Route::group(["prefix" => "encargo", "as" => "encargo.", "middleware" => ["auth"]], function() 
{
    Route::get("/", [EncargoController::class, "encargos"])->name("encargos");
    Route::get("/crear", [EncargoController::class, "formCrear"])->name("crear");
    Route::post("/compraEnc", [EncargoController::class, "compraEnc"])->name("compraEnc");
    Route::post("/eliminar", [EncargoController::class, "eliminar"])->name("eliminar");
});

Route::group(["prefix" => "carrito", "as" => "carrito.", "middleware" => ["auth"]], function() 
{
    Route::post("/encargar", [CarritoController::class, "encargar"])->name("encargar");
    Route::post("/aprobar", [CarritoController::class, "aprobar"])->name("aprobar");
    Route::post("/rechazar", [CarritoController::class, "rechazar"])->name("rechazar");
});

require __DIR__.'/auth.php';
