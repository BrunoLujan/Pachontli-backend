<?php

namespace Database\Seeders;

use App\Models\Veterinario;
use Illuminate\Database\Seeder;

class VeterinarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $veterinario = new Veterinario();
        $veterinario->user_id = 1;
        $veterinario->nombre = 'César';
        $veterinario->apellidos = 'Luján';
        $veterinario->telefono = '1111111111';
        $veterinario->direccion = 'CDMX';
        $veterinario->cedula = 'LOLC99';
        $veterinario->save();

        $veterinario = new Veterinario();
        $veterinario->user_id = 2;
        $veterinario->nombre = 'Héctor';
        $veterinario->apellidos = 'Moscoso';
        $veterinario->telefono = '2222222222';
        $veterinario->direccion = 'Coatza';
        $veterinario->cedula = 'HECMOS';
        $veterinario->save();

        $veterinario = new Veterinario();
        $veterinario->user_id = 3;
        $veterinario->nombre = 'Simi';
        $veterinario->apellidos = 'Lares';
        $veterinario->telefono = '3333333333';
        $veterinario->direccion = 'CDMX';
        $veterinario->cedula = 'SIMI';
        $veterinario->save();
    }
}
