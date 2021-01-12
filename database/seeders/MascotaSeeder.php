<?php

namespace Database\Seeders;

use App\Models\Mascota;
use Illuminate\Database\Seeder;

class MascotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mascota = new Mascota();
        $mascota->user_id = 1;
        $mascota->nombre = 'cami';
        $mascota->sexo = 'Hembra';
        $mascota->especie = 'Perro';
        $mascota->raza = 'ratonero';
        $mascota->peso = '4.1';
        $mascota->altura = '.6';
        $mascota->edad = 4;
        $mascota->descripcion = 'la más chida!';
        $mascota->save();

        $mascota = new Mascota();
        $mascota->user_id = 1;
        $mascota->nombre = 'max';
        $mascota->sexo = 'Macho';
        $mascota->especie = 'Perro';
        $mascota->raza = 'ratonero';
        $mascota->peso = '6';
        $mascota->altura = '.8';
        $mascota->edad = 12;
        $mascota->descripcion = 'el más chido!';
        $mascota->save();

        $mascota = new Mascota();
        $mascota->user_id = 2;
        $mascota->nombre = 'jocho';
        $mascota->sexo = 'Macho';
        $mascota->especie = 'Perro';
        $mascota->raza = 'ratonero';
        $mascota->peso = '6';
        $mascota->altura = '.8';
        $mascota->edad = 12;
        $mascota->descripcion = 'el más peque';
        $mascota->save();
    }
}
