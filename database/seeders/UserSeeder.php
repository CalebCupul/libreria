<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::create([

            'name' => 'Caleb',
            'email' => 'calebcupul@gmail.com',
            'password' => bcrypt('caleb123'),
            'phone_number' => '32215021322',
            'address' => 'Cucosta, Ixtapa',
            'proof_of_address' => 'demoComprobante.jpg',
            'image' => 'demoImagen.jpg'
            
        ])->assignRole('Super Administrador');

        User::create([

            'name' => 'demoCliente',
            'email' => 'demoCliente@gmail.com',
            'password' => bcrypt('caleb123'),
            'phone_number' => '32215021322',
            'address' => 'Cucosta, Ixtapa',
            'proof_of_address' => 'demoComprobante.jpg',
            'image' => 'demoImagen.jpg'
            
        ])->assignRole('Cliente');

        User::create([

            'name' => 'demoEmpleado',
            'email' => 'demoEmpleado@gmail.com',
            'password' => bcrypt('caleb123'),
            'phone_number' => '32215021322',
            'address' => 'Cucosta, Ixtapa',
            'proof_of_address' => 'demoComprobante.jpg',
            'image' => 'demoImagen.jpg'
            
        ])->assignRole('Empleado');

        User::create([

            'name' => 'DemoAdmin',
            'email' => 'demoAdmin@gmail.com',
            'password' => bcrypt('caleb123'),
            'phone_number' => '32215021322',
            'address' => 'Cucosta, Ixtapa',
            'proof_of_address' => 'demoComprobante.jpg',
            'image' => 'demoImagen.jpg',
            
        ])->assignRole('Administrador');
    }
}
