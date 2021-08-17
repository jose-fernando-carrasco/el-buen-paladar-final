<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Gerente']);
        $role2 = Role::create(['name' => 'Cajero']);

        Permission::create(['name' => 'admin.home'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.alimentos.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.alimentos.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.alimentos.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.alimentos.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.usuarios.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.usuarios.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.usuarios.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.menus.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.menus.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.menus.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.menus.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.especiales.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.especiales.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.especiales.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.especiales.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.pedidos.index'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.cuentas.index'])->syncRoles([$role1, $role2]);

    }
}
