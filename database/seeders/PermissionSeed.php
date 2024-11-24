<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $role_admin = Role::create([
            'name'=>'admin'
        ]);
        $role_studiante = Role::create([
            'name'=>'estudiante'
        ]);
        $estudiantes_index = Permission::create([
            'name' => 'users.index'
        ])->assignRole($role_admin);
        $estudiantes_create = Permission::create([
            'name' => 'users.create'
        ])->assignRole($role_admin);
        $estudiantes_store = Permission::create([
            'name' => 'users.store'
        ])->assignRole($role_admin);
        $estudiantes_edit = Permission::create([
            'name' => 'users.edit'
        ])->assignRole($role_admin);
        $estudiantes_update = Permission::create([
            'name' => 'users.update'
        ])->assignRole($role_admin);
        $estudiantes_show = Permission::create([
            'name' => 'users.show'
        ])->assignRole($role_admin);
        $estudiantes_delete = Permission::create([
            'name' => 'users.delete'
        ])->assignRole($role_admin);
        $promociones_index = Permission::create([
            'name' => 'promociones.index'
        ])->assignRole($role_admin);
        $promociones_create = Permission::create([
            'name' => 'promociones.create'
        ])->assignRole($role_admin);
        $promociones_store = Permission::create([
            'name' => 'promociones.store'
        ])->assignRole($role_admin);
        $promociones_edit = Permission::create([
            'name' => 'promociones.edit'
        ])->assignRole($role_admin);
        $promociones_update = Permission::create([
            'name' => 'promociones.update'
        ])->assignRole($role_admin);
        $promociones_show = Permission::create([
            'name' => 'promociones.show'
        ])->assignRole($role_admin);
        $promociones_delete = Permission::create([
            'name' => 'promociones.delete'
        ])->assignRole($role_admin);

        $practica_index = Permission::create([
            'name' => 'practicas.index'
        ])->assignRole([$role_admin,$role_studiante]);
        $practica_create = Permission::create([
            'name' => 'practicas.create'
        ])->assignRole($role_admin);
        $practica_store = Permission::create([
            'name' => 'practicas.store'
        ])->assignRole($role_admin);
        $practica_edit = Permission::create([
            'name' => 'practicas.edit'
        ])->assignRole($role_admin);
        $practica_update = Permission::create([
            'name' => 'practicas.update'
        ])->assignRole($role_admin);
        $practica_show = Permission::create([
            'name' => 'practicas.show'
        ])->assignRole($role_admin); 
        $practica_delete = Permission::create([
            'name' => 'practicas.delete'
        ])->assignRole($role_admin);
        $practica_registrarfinal = Permission::create([
            'name' => 'practicas.registrarfinal'
        ])->assignRole($role_studiante);
    }
}
