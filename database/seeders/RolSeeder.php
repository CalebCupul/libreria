<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

// Spatie
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use Spatie\Permission\Traits\HasRoles;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        app()[PermissionRegistrar::class]->forgetCachedPermissions();


        $rolAdministrador = Role::create(['name' => 'Administrador']);
        $rolEmpleado = Role::create(['name' => 'Empleado']);
        $rolCliente = Role::create(['name' => 'Cliente']);
        $rolSuperAdministrador = Role::create(['name' => 'Super Administrador']);

        Permission::create(['name' => 'libros'])->syncRoles([$rolSuperAdministrador, $rolAdministrador, $rolCliente]);
        Permission::create(['name' => 'libros.create'])->syncRoles([$rolSuperAdministrador, $rolAdministrador]);
        Permission::create(['name' => 'libros.edit'])->syncRoles([$rolSuperAdministrador, $rolAdministrador]);
        Permission::create(['name' => 'libros.destroy'])->syncRoles([$rolSuperAdministrador, $rolAdministrador]);

        Permission::create(['name' => 'usuarios'])->syncRoles([$rolSuperAdministrador, $rolAdministrador, $rolEmpleado]);
        Permission::create(['name' => 'usuarios.create'])->syncRoles([$rolSuperAdministrador, $rolAdministrador, $rolEmpleado]);
        Permission::create(['name' => 'usuarios.edit'])->syncRoles([$rolSuperAdministrador, $rolAdministrador, $rolEmpleado]);
        Permission::create(['name' => 'usuarios.destroy'])->syncRoles([$rolSuperAdministrador, $rolAdministrador]);

        Permission::create(['name' => 'prestamos'])->syncRoles([$rolSuperAdministrador, $rolAdministrador, $rolEmpleado]);
        Permission::create(['name' => 'prestamos.create'])->syncRoles([$rolSuperAdministrador, $rolAdministrador, $rolEmpleado]);

        $demoUser = User::factory()->create([
            'name' => 'demoCliente',
            'email' => 'demoCliente@gmail.com',
            'domicilio' => 'Cucosta, Ixtapa',
            'imagen' => 'demoImagen.jpg',
            'comprobante' => 'demoComprobante.jpg',
            'telefono' => '32215021322',
            'rol' => 'Cliente'
        ]);

        $demoUser->assignRole($rolCliente);

        $demoUser = User::factory()->create([
            'name' => 'demoEmpleado',
            'email' => 'demoEmpleado@gmail.com',
            'domicilio' => 'Cucosta, Ixtapa',
            'imagen' => 'demoImagen.jpg',
            'comprobante' => 'demoComprobante.jpg',
            'telefono' => '32215021322',
            'rol' => 'Empleado'
        ]);

        $demoUser->assignRole($rolEmpleado);

        $demoUser = User::factory()->create([
            'name' => 'demoAdmin',
            'email' => 'demoAdmin@gmail.com',
            'domicilio' => 'Cucosta, Ixtapa',
            'imagen' => 'demoImagen.jpg',
            'comprobante' => 'demoComprobante.jpg',
            'telefono' => '32215021322',
            'rol' => 'Administrador'
        ]);

        $demoUser->assignRole($rolAdministrador);

        $demoUser = User::factory()->create([
            'name' => 'demoSuper',
            'email' => 'demoSuper@gmail.com',
            'domicilio' => 'Cucosta, Ixtapa',
            'imagen' => 'demoImagen.jpg',
            'comprobante' => 'demoComprobante.jpg',
            'telefono' => '32215021322',
            'rol' => 'Super Administrador'
        ]);

        $demoUser->assignRole($rolSuperAdministrador);


    }
}
