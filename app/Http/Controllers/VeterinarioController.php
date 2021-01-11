<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Veterinario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class VeterinarioController extends Controller
{
    public function getVeterinarios(){
        $veterinarios = Veterinario::all();
        return response()->json($veterinarios);
    }

    public function registrarVeterinario(Request $request){
        $rules = [
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:6',
            'nombre'=>'required|string',
            'apellidos'=>'required|string',
            'telefono'=>'required|string',
            'direccion'=>'required|string',
            'cedula'=>'required|string',
        ];
        $this->validate($request, $rules);

        $user = User::create([
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);

        $veterinario = new Veterinario();
        $veterinario->user_id = $user->id;
        $veterinario->nombre = $request->input('nombre');
        $veterinario->apellidos = $request->input('apellidos');
        $veterinario->telefono = $request->input('telefono');
        $veterinario->direccion = $request->input('direccion');
        $veterinario->cedula = $request->input('cedula');

        $veterinario->save();

        $token = JWTAuth::fromUser($user);

        return response()->json(compact('user','token'),201);
    }
}
