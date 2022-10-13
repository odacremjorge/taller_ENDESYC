<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Operator;
use App\Models\Client;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([

            'name' => 'Jorge',

            'email' => 'jorgemercado212@gmail.com',

            'role' => 'ADMINISTRADOR',

            'password' => bcrypt('12345678'),

        ]);

        Client::create([

            'name_client' => 'Ende Servicios y Construcciones S.A.',

            'nit' => '1020673029',

            
        ]);

        Operator::create([

            'name_operator'=> 'Jorge Alejandro Mercado Araya',
            'type_operator'=> 'Responsable',
            'phone'=> '60412888',
            'code_operator'=> '712', 
            'ci'=> '5722307-Or',
        ]);

        Operator::create([

            'name_operator'=> 'Fabricio Villarroel Arnez',
            'type_operator'=> 'Conductor',
            'phone'=> '70414142',
            'code_operator'=> '666', 
            'ci'=> '5745223-Or',
        ]);

        Vehicle::create([

            'cia'=>'712',
            'company'=>'ENDESYC',
            'plate'=>'5564 JAM',
            'type'=>'Camioneta', 
            'mark'=>'Toyota', 
            'model'=>'Hilux', 
            'year'=>'2021',
            'color'=>'Blanco', 
            'displacement'=>'2300cc', 
            'motor_type'=>'Inyeccion',
            'serie'=>'AS456X123', 
            'chassis'=>'XVF56433HJYG', 
            
           
        ]);
    }
}
