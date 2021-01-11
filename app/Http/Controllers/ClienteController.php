<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\User;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function getCliente(Request $request){
        $user_id = $request->user()->id;
        $cliente = Cliente::where('user_id', $user_id)->first();
        return response()->json($cliente);
    }
}
