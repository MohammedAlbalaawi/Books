<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
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
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create Permissions
        $allPermissions = [
            'dashboard' => ['viewAny'],
            'authors' => ['viewAny', 'view', 'create', 'update', 'delete'],
            'books' => ['viewAny', 'view', 'create', 'update', 'delete'],
        ];

        foreach ($allPermissions as $group => $permissions) {
            foreach ($permissions as $permission) {
                Permission::updateOrCreate([
                //    'group' => $group,
                    'name' => "$permission " . Str::singular($group),
                    'guard_name' => 'web',
                ]);
            }
        }

        // Create Role
        $role = Role::updateOrCreate([
            'name' => 'admin',
        ]);
        $role->givePermissionTo(Permission::all());

//        $role2->givePermissionTo(Permission::where('name', '=', 'create book')->first());

        // Create User
        $user = User::firstOrCreate([
            'name' => 'admin',
            'email' => 'admin@admin.com',
        ],[
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            ]);


        $user->assignRole($role);

    }
}
