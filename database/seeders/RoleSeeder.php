<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAdmin = Role::create(['name' => 'Administrador']);
        $roleSuper = Role::create(['name' => 'Supervisor']);
        $roleClient = Role::create(['name' => 'Cliente']);

        // $roleAdmin = Role::where('name', 'Administrador')->first();
        // $roleSuper = Role::where('name', 'Supervisor')->first();
        // $roleClient = Role::where('name', 'Cliente')->first();

        /*** */
        Permission::create(['name' => 'paginas.cliente'])->syncRoles([$roleClient]);

        /**Permisos backups */
         Permission::create(['name' => 'panel.index'])->syncRoles([$roleAdmin,$roleSuper,$roleClient]);
         Permission::create(['name' => 'admin.backup.index'])->syncRoles([$roleAdmin]);
         Permission::create(['name' => 'admin.backup.create'])->syncRoles([$roleAdmin]);
         Permission::create(['name' => 'admin.backup.delete'])->syncRoles([$roleAdmin]);
         Permission::create(['name' => 'admin.backup.download'])->syncRoles([$roleAdmin]);
       /**Permisos usuarios */
         Permission::create(['name' => 'admin.user.index'])->syncRoles([$roleAdmin]);
         Permission::create(['name' => 'admin.user.create'])->syncRoles([$roleAdmin]);
         Permission::create(['name' => 'admin.user.edit'])->syncRoles([$roleAdmin]);
         Permission::create(['name' => 'admin.user.destroy'])->syncRoles([$roleAdmin]);
         Permission::create(['name' => 'admin.user.habilitar'])->syncRoles([$roleAdmin]);
         Permission::create(['name' => 'ver.menu.admin'])->syncRoles([$roleAdmin]);

    }
}
