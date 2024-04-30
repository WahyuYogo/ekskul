<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_admin = Role::updateOrcreate([
            'name' => 'admin',
        ],
        ['name' => 'admin']);

        $role_user = Role::updateOrcreate([
            'name' => 'user',
        ],
        ['name' => 'user']);

        $permission = Permission::updateOrcreate(
            [
                'name' => 'admin_dashboard',
            ],
            ['name' => 'admin_dashboard']
        );
        $permission1 = Permission::updateOrcreate(
            [
                'name' => 'admin_dashboard',
            ],
            ['name' => 'admin_dashboard']
        );
        $permission2 = Permission::updateOrcreate(
            [
                'name' => 'user_dashboard',
            ],
            ['name' => 'user_dashboard']
        );

        $role_admin->givePermissionTo($permission1);
        $role_user->givePermissionTo($permission2);

        $user = User::find(1);
        $user->assignRole('admin');
    }
}
