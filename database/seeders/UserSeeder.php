<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::create(['name' => 'administrator']);
        Role::create(['name' => 'mabes']);
        Role::create(['name' => 'polda']);

        $user = User::create([
            'username' => 'administrator',
            'password' => bcrypt(123456),
            'name' => 'Administrator'
        ]);

        $user->assignRole('administrator');
    }
}
