<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function registrarCliente(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:6',
            'nombre' => 'required|string',
            'apellidos' => 'required|string',
            'telefono' => 'required|string',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $user = User::create([
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);

        $cliente = new Cliente();
        $cliente->user_id = $user->id;
        $cliente->nombre = $request->input('nombre');
        $cliente->apellidos = $request->input('apellidos');
        $cliente->telefono = $request->input('telefono');
        $cliente->save();

        return response()->json([
            'message' => 'Cliente registrado con exito'
        ]);
    }

    public function login(){

    }





    public function logout(){

        Auth::guard('api')->logout();
        $success = 'Sesión cerrada';
        return compact('success');
    }
}
