<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Exceptions\PermissionAlreadyExists;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::query()->delete();

        $roles = config('custom.initial.roles', []);

        foreach ($roles as $role => $permissions) {
            Role::findByName($role)->permissions()->detach();

            foreach ($permissions as $permission) {
                try {
                    Role::findByName($role)->givePermissionTo($permission);
                } catch (PermissionDoesNotExist) {
                    Permission::create(['name' => $permission]);

                    Role::findByName($role)->givePermissionTo($permission);
                }

            }
        }
    }
}
