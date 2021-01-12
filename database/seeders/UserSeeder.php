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
        $usuario->email = 'cesar@mail.com';
        $usuario->password = Hash::make('ola12345');
        $usuario->save();

        $usuario = new User();
        $usuario->email = 'hector@mail.com';
        $usuario->password = Hash::make('ola12345');
        $usuario->save();

        $usuario = new User();
        $usuario->email = 'simi@mail.com';
        $usuario->password = Hash::make('ola12345');
        $usuario->save();
    }
}
