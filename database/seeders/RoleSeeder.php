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
        
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Cliente']);
        $role3 = Role::create(['name' => 'Usuario']);

        Permission::create(['name' => '/admin'])->syncRoles([$role1, $role2,$role3]);
        Permission::create(['name' => 'admin.links.index'])->syncRoles([$role1, $role2]);;
        Permission::create(['name' => 'admin.links.create'])->syncRoles([$role1, $role2]);;
        Permission::create(['name' => 'admin.links.edit'])->syncRoles([$role1, $role2]);;
        Permission::create(['name' => 'admin.links.delete'])->syncRoles([$role1, $role2]);;

        Permission::create(['name' => 'admin.users_linktree.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users_linktree.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users_linktree.update'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users_linktree.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.users.edit'])->syncRoles([$role1, $role2]);;

        Permission::create(['name' => 'admin.video.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.video.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.video.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.video.update'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.video.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.imagenes.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.imagenes.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.imagenes.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.imagenes.update'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.imagenes.destroy'])->syncRoles([$role1]);
    }
}
