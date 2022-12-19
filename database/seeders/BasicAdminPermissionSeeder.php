<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class BasicAdminPermissionSeeder extends Seeder
{
    /**
     * Create the initial roles and permissions.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        // create permissions
        $permissions = [
            'permission list',
            'permission create',
            'permission edit',
            'permission delete',
            'role list',
            'role create',
            'role edit',
            'role delete',
            'user list',
            'user create',
            'user delete',
            'user edit',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        /* Roles Y Permisos */

        // Rol Agente
        $role1 = Role::create(['name' => 'agente']);

        //Rol Admin
        $role2 = Role::create(['name' => 'admin']);
        $role2->givePermissionTo('permission list');
        $role2->givePermissionTo('role list');
        $role2->givePermissionTo('user list');

        //Rol Super Admin
        $role3 = Role::create(['name' => 'super-admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider        
        // create demo users



        /* Usuarios con Roles */

        //Usuario Super Admin
        $user = \App\Models\User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'superadmin@laraveltuts.com',
        ]);
        $user->assignRole($role3);

        //Usuario Admin
        $user = \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@laraveltuts.com',
        ]);
        $user->assignRole($role2);

        //Usuario Agente
        $user = \App\Models\User::factory()->create([
            'name' => 'Example User',
            'email' => 'test@laraveltuts.com',
        ]);
        $user->assignRole($role1);
    }
}
