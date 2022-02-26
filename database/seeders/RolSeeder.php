<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// Spatie
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
    }
}
