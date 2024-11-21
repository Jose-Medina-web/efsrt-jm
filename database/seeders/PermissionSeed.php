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
            'name' => 'estudiantes.index'
        ])->assignRole($role_admin);
        $estudiantes_create = Permission::create([
            'name' => 'estudiantes.create'
        ])->assignRole($role_admin);
        $estudiantes_store = Permission::create([
            'name' => 'estudiantes.store'
        ])->assignRole($role_admin);
        $estudiantes_edit = Permission::create([
            'name' => 'estudiantes.edit'
        ])->assignRole($role_admin);
        $estudiantes_update = Permission::create([
            'name' => 'estudiantes.update'
        ])->assignRole($role_admin);
        $estudiantes_show = Permission::create([
            'name' => 'estudiantes.show'
        ])->assignRole($role_admin);
        $estudiantes_delete = Permission::create([
            'name' => 'estudiantes.delete'
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
        
    }
}
