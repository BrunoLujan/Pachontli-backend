<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Cliente;
use Brick\Math\BigInteger;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    public function registrarCita(Request $request, BigInteger $idVeterinario){
        $rules = [
            'fecha'=>'required|date',
            'hora'=>'required|hora',
        ];
        $this->validate($request, $rules);

        $user_cliente = Cliente::where('user_id', $request->user()->id)->first();



        $cita = new Cita();
        $cita->veterinario_id = $idVeterinario;
        $cita->cliente_id = $user_cliente->id;
        $cita->fecha = $request->input('fecha');
        $cita->hora = $request->input('hora');

        $cita->save();

        return response()->json([
            'message' => 'Cita creada con éxito'
        ]);
    }

    public function editarCita(Request $request, BigInteger $veterinario, BigInteger $idCita){
        $rules = [
            'fecha'=>'required|date',
            'hora'=>'required|hora',
        ];
        $this->validate($request, $rules);

        $user_cliente = Cliente::where('user_id', $request->user()->id)->first();


        $cita = Cita::find($idCita)->first();
        $cita->veterinario_id = $veterinario;
        $cita->cliente_id = $user_cliente->id;
        $cita->fecha = $request->input('fecha');
        $cita->hora = $request->input('hora');

        $cita->save();

        return response()->json([
            'message' => 'Cita editada con éxito'
        ]);
    }

    public function eliminarCita(BigInteger $idCita){
        $cita = Cita::find($idCita)->first();
        $cita->delete();
        return response()->json([
            'message' => 'Cita eliminada con éxito'
        ]);
    }

    public function getCitas(Request $request){
        $user_id = $request->user()->id;
        $citas = Cita::where('user_id', $user_id)->get();
        return response()->json($citas);
    }
}
