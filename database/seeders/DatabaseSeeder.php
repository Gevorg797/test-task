<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'Manage Rooms']);
        Permission::create(['name' => 'Manage Reserves']);


        $role = Role::create(['name' => 'user']);
        $role->givePermissionTo('Manage Reserves');


        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());

        \App\Models\User::factory(1)->create();

        \App\Models\Room::factory()->count(10)->create();
    }
}
