<?php

namespace Database\Seeders;

use App\Models\Cita;
use Illuminate\Database\Seeder;

class CitaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cita = new Cita();
        $cita->veterinario_id = 1;
        $cita->mascota_id = 1;
        $cita->fecha = "2021-12-12";
        $cita->hora = "03:02";
        $cita->save();

        $cita = new Cita();
        $cita->veterinario_id = 1;
        $cita->mascota_id = 2;
        $cita->fecha = "2021-12-12";
        $cita->hora = "03:02";
        $cita->save();

        $cita = new Cita();
        $cita->veterinario_id = 1;
        $cita->mascota_id = 3;
        $cita->fecha = "2021-12-12";
        $cita->hora = "03:02";
        $cita->save();
    }
}
