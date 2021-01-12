<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Cliente;
use App\Models\Mascota;
use Brick\Math\BigInteger;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    public function registrarCita(Request $request, BigInteger $idVeterinario){
        $rules = [
            'fecha'=>'required',
            'hora'=>'required',
        ];
        $this->validate($request, $rules);

        $user_mascota = Mascota::where('user_id', $request->user()->id)->first();

        $cita = new Cita();
        $cita->veterinario_id = $idVeterinario;
        $cita->mascota_id = $user_mascota->id;
        $cita->fecha = $request->input('fecha');
        $cita->hora = $request->input('hora');

        $cita->save();

        return response()->json([
            'message' => 'Cita creada con éxito'
        ]);
    }

    public function editarCita(Request $request, BigInteger $veterinario, BigInteger $idCita){
        $rules = [
            'fecha'=>'required',
            'hora'=>'required',
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

    public function getCitasCliente(Request $request){
        $user_id = $request->user()->id;
        $mis_mascotas = Mascota::where('user_id', $user_id)->get();
        $citas = Cita::where('mascota_id', $mis_mascotas->id)->get();
        return response()->json($citas);
    }
}
