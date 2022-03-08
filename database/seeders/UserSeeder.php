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
            'domicilio' => 'Cucosta, Ixtapa',
            'imagen' => 'demoImagen.jpg',
            'comprobante' => 'demoComprobante.jpg',
            'telefono' => '32215021322'
        ])->assignRole('Super Administrador');

        User::create([
            'name' => 'demoCliente',
            'email' => 'demoCliente@gmail.com',
            'password' => bcrypt('caleb123'),
            'domicilio' => 'Cucosta, Ixtapa',
            'imagen' => 'demoImagen.jpg',
            'comprobante' => 'demoComprobante.jpg',
            'telefono' => '32215021322'
        ])->assignRole('Cliente');

        User::create([
            'name' => 'demoEmpleado',
            'email' => 'demoEmpleado@gmail.com',
            'password' => bcrypt('caleb123'),
            'domicilio' => 'Cucosta, Ixtapa',
            'imagen' => 'demoImagen.jpg',
            'comprobante' => 'demoComprobante.jpg',
            'telefono' => '32215021322'
        ])->assignRole('Empleado');

        User::create([
            'name' => 'DemoAdmin',
            'email' => 'demoAdmin@gmail.com',
            'password' => bcrypt('caleb123'),
            'domicilio' => 'Cucosta, Ixtapa',
            'imagen' => 'demoImagen.jpg',
            'comprobante' => 'demoComprobante.jpg',
            'telefono' => '32215021322'
        ])->assignRole('Administrador');
    }
}
