<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Cliente;
use App\Models\Mascota;
use Brick\Math\BigInteger;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Integer;

class CitaController extends Controller
{
    public function registrarCita(Request $request, int $idVeterinario, int $idMascota){
        $rules = [
            'fecha'=>'required',
            'hora'=>'required',
        ];
        $this->validate($request, $rules);

        //$user_mascota = Mascota::where('user_id', $request->user()->id)->first();

        $cita = new Cita();
        $cita->veterinario_id = $idVeterinario;
        $cita->mascota_id = $idMascota;
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
        $mascotas = Mascota::where('user_id', $user_id)->get();
        foreach ($mascotas as $mascota){
            $citas = Cita::where('mascota_id', $mascota->id)->get();
            $array[] = $citas;
        }
        return $array;

    }
}
