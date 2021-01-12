<?php


namespace Database\Seeders;


use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $usuario = new User();
        $usuario->email = 'admin@mail.com';
        $usuario->password = Hash::make('ola12345');
        $usuario->save();

        $usuario = new User();
        $usuario->email = 'admin2@mail.com';
        $usuario->password = Hash::make('ola12345');
        $usuario->save();

        $usuario = new User();
        $usuario->email = 'admin3@mail.com';
        $usuario->password = Hash::make('ola12345');
        $usuario->save();

    }
}
