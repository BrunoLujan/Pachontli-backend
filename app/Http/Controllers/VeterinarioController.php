<?php

namespace App\Http\Controllers;

use App\Models\Veterinario;
use Illuminate\Http\Request;

class VeterinarioController extends Controller
{
    public function getVeterinarios(){
        $veterinarios = Veterinario::all();
        return response()->json($veterinarios);
    }
}
