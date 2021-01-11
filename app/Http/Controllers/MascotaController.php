<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use App\Models\User;
use Illuminate\Http\Request;

class MascotaController extends Controller
{
    public function registrarMascota(Request $request){
        $rules = [
            'nombre'=>'required|string',
            'sexo'=>'required|string',
            'especie'=>'required|string',
            'raza'=>'required|string',
            'peso'=>'required|string',
            'altura'=>'required|float',
            'edad'=>'required|integer',
            'descripcion'=>'required|string',
        ];
        $this->validate($request, $rules);

        $mascota = new Mascota();
        $mascota->cliente_id = $request->user()->id;
        $mascota->nombre = $request->input('nombre');
        $mascota->sexo = $request->input('sexo');
        $mascota->especie = $request->input('especie');
        $mascota->raza = $request->input('raza');
        $mascota->peso = $request->input('peso');
        $mascota->altura = $request->input('altura');
        $mascota->edad = $request->input('edad');
        $mascota->descripcion = $request->input('descripcion');

        $mascota->save();

        return response()->json([
            'message' => 'Mascota creada con éxito'
        ]);

    }

    public function editarMascota(Request $request, Mascota $mascota){
        $rules = [
            'nombre'=>'required|string',
            'sexo'=>'required|string',
            'especie'=>'required|string',
            'raza'=>'required|string',
            'peso'=>'required|string',
            'altura'=>'required|float',
            'edad'=>'required|integer',
            'descripcion'=>'required|string',
        ];
        $this->validate($request, $rules);

        $mascota->nombre = $request->input('nombre');
        $mascota->sexo = $request->input('sexo');
        $mascota->especie = $request->input('especie');
        $mascota->raza = $request->input('raza');
        $mascota->peso = $request->input('peso');
        $mascota->altura = $request->input('altura');
        $mascota->edad = $request->input('edad');
        $mascota->descripcion = $request->input('descripcion');

        $mascota->save();

        return response()->json([
            'message' => 'Mascota editada con éxito'
        ]);
    }

    public function eliminarMascota(Mascota $mascota){
        $mascota->delete();
        return response()->json([
            'message' => 'Mascota eliminada con éxito'
        ]);
    }

    public function getMascotas (Request $request){
        $user_id = $request->user()->id;
        $mascota = Mascota::where('user_id', $user_id)->first();
        return response()->json($mascota);
    }


}
