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

    public function registrarVeterinario(Request $request){
        $rules = [
            'nombre'=>'required|string',
            'apellidos'=>'required|string',
            'telefono'=>'required|string',
            'direccion'=>'required|string',
            'cedula'=>'required|string',
        ];
        $this->validate($request, $rules);

        $veterinario = new Veterinario();
        $veterinario->user_id = $request->user()->id;
        $veterinario->nombre = $request->input('nombre');
        $veterinario->apellidos = $request->input('apellidos');
        $veterinario->telefono = $request->input('telefono');
        $veterinario->direccion = $request->input('direccion');
        $veterinario->cedula = $request->input('cedula');

        $veterinario->save();

        return response()->json([
            'message' => 'Veterinario creado con éxito'
        ]);

    }
}
