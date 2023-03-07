<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = config('custom.initial.roles', []);

        foreach ($roles as $role => $permission) {
            User::factory()
                ->create([
                    'name' => ucwords($role),
                    'email' => strtolower("$role@laravel9.test")
                ])
                ->assignRole(strtolower($role));
        }
    }
}
