<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IdiomaController extends Controller
{

    public function cambiar($idioma)
    {
        session(['locale' => $idioma]);
        
        return redirect()->back();
    }

}
