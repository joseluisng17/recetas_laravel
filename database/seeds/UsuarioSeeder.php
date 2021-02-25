<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = User::create([
            'name' => 'Jose',
            'email' => 'jose@gmail.com',
            'password' => Hash::make('12345678'),
            'url' => 'https://twitter.com/Jose_NajarG'
        ]);
        //$user->perfil()->create();

        $user2 = User::create([
            'name' => 'Luis',
            'email' => 'luis@gmail.com',
            'password' => Hash::make('12345678'),
            'url' => 'https://twitter.com/Jose_NajarG'
        ]);
        //$user2->perfil()->create();
       
    }
}
