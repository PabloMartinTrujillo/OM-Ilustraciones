<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GaleriaController;
use App\Http\Controllers\ImagenController;

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

Route::get('/', function () {
    return view('main');
})->name("main");

Route::group(["prefix" => "galeria", "as" => "galeria.", /* "middleware" => ["auth"] */], function() 
{
    Route::get("/", [GaleriaController::class, "mostrar"])->name("mostrar");
    Route::get("/crear", [GaleriaController::class, "formCrear"])->middleware(["adminUser"])->name("formCrear");
    Route::post("/creaGaleria", [GaleriaController::class, "creaGaleria"])->name("creaGaleria");
    Route::get("/modificar/{idGal}", [GaleriaController::class, "modificar"])->middleware(["adminUser"])->name("modificar");
    Route::post("/borrar/{idGal}", [GaleriaController::class, "borrar"])->middleware(["adminUser"])->name("borrar") ;
    // Route::post("/encargar",  [EncargoController::class, "encargar"])->name("encargar") ;
    // Route::post("/modificar", [EncargoController::class, "guardarMod"])->name("guardarMod");
});

Route::group(["prefix" => "imagen", "as" => "imagen.", /* "middleware" => ["auth"] */], function() 
{
    // Route::get("/", [GaleriaController::class, "mostrar"])->name("mostrar");
    Route::get("/{idGal}/add", [ImagenController::class, "addImgForm"])->middleware(["adminUser"])->name("addImg");
    Route::post("/guardar", [ImagenController::class, "guardar"])->name("guardar");
    // Route::get("/modificar/{idGal}", [GaleriaController::class, "modificar"])->middleware(["adminUser"])->name("modificar");
    // Route::post("/borrar/{idGal}", [GaleriaController::class, "borrar"])->middleware(["adminUser"])->name("borrar") ;
    // Route::post("/encargar",  [EncargoController::class, "encargar"])->name("encargar") ;
    // Route::post("/modificar", [EncargoController::class, "guardarMod"])->name("guardarMod");
});

require __DIR__.'/auth.php';
