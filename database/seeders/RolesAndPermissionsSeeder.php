<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // USER MODEL
        $userPermissionCreate = Permission::create(['name' => 'create-user', 'description' => 'create user']);
        $userPermissionRead = Permission::create(['name' => 'read-user', 'description' => 'read user']);
        $userPermissionUpdate = Permission::create(['name' => 'update-user', 'description' => 'update user']);
        $userPermissionDelete = Permission::create(['name' => 'delete-user', 'description' => 'delete User']);

        // ROLE MODEL
        $rolePermissionCreate = Permission::create(['name' => 'create-role', 'description' => 'create role']);
        $rolePermissionRead = Permission::create(['name' => 'read-role', 'description' => 'read role']);
        $rolePermissionUpdate= Permission::create(['name' => 'update-role', 'description' => 'update role']);
        $rolePermissionDelete = Permission::create(['name' => 'delete-role', 'description' => 'delete role']);

        // Drone MODEL
        $dronePermissionCreate = Permission::create(['name' => 'create-drone', 'description' => 'create drone']);
        $dronePermissionRead = Permission::create(['name' => 'read-drone', 'description' => 'read drone']);
        $dronePermissionUpdate = Permission::create(['name' => 'update-drone', 'description' => 'update drone']);
        $dronePermissionDelete = Permission::create(['name' => 'delete-drone', 'description' => 'delete drone']);

        // Satuan Kerja MODEL
        $satuanKerjaPermissionCreate = Permission::create(['name' => 'create-satuanKerja', 'description' => 'create Satuan Kerja']);
        $satuanKerjaPermissionRead = Permission::create(['name' => 'read-satuanKerja', 'description' => 'read Satuan Kerja']);
        $satuanKerjaPermissionUpdate = Permission::create(['name' => 'update-satuanKerja', 'description' => 'update Satuan Kerja']);
        $satuanKerjaPermissionDelete = Permission::create(['name' => 'delete-satuanKerja', 'description' => 'delete Satuan Kerja']);

        // Asset MODEL
        $assetPermissionCreate = Permission::create(['name' => 'create-asset', 'description' => 'create asset']);
        $assetPermissionRead = Permission::create(['name' => 'read-asset', 'description' => 'read asset']);
        $assetPermissionUpdate = Permission::create(['name' => 'update-asset', 'description' => 'update asset']);
        $assetPermissionDelete = Permission::create(['name' => 'delete-asset', 'description' => 'delete asset']);
        

        $superAdminRole = Role::create(['name' => 'super-admin']);
        $adminRole = Role::create(['name' => 'admin']);

        $superAdminRole->syncPermissions([
            $userPermissionCreate,
            $userPermissionRead,
            $userPermissionUpdate,
            $userPermissionDelete,

            // ROLE MODEL
            $rolePermissionCreate,
            $rolePermissionRead,
            $rolePermissionUpdate,
            $rolePermissionDelete,

            // Drone MODEL
            $dronePermissionCreate,
            $dronePermissionRead,
            $dronePermissionUpdate,
            $dronePermissionDelete,

            // Satuan Kerja MODEL
            $satuanKerjaPermissionCreate,
            $satuanKerjaPermissionRead,
            $satuanKerjaPermissionUpdate,
            $satuanKerjaPermissionDelete,

            // Asset MODEL
            $assetPermissionCreate,
            $assetPermissionRead,
            $assetPermissionUpdate,
            $assetPermissionDelete,
        ]);

         $adminRole->syncPermissions([
            $userPermissionCreate,
            $userPermissionRead,
            $userPermissionUpdate,
            $userPermissionDelete,

            // ROLE MODEL
            $rolePermissionCreate,
            $rolePermissionRead,
            $rolePermissionUpdate,
            $rolePermissionDelete,

            // Drone MODEL
            $dronePermissionCreate,
            $dronePermissionRead,
            $dronePermissionUpdate,
            $dronePermissionDelete,

            // Satuan Kerja MODEL
            $satuanKerjaPermissionCreate,
            $satuanKerjaPermissionRead,
            $satuanKerjaPermissionUpdate,
            $satuanKerjaPermissionDelete,

            // Asset MODEL
            $assetPermissionCreate,
            $assetPermissionRead,
            $assetPermissionUpdate,
            $assetPermissionDelete,
        ]);

        $superAdmin = User::create([
            'name' => 'super admin',
            'is_admin' => 1,
            'email' => 'super@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'approved_at' => now(),
        ]);

        $admin = User::create([
            'name' => 'admin',
            'is_admin' => 1,
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);

        $operator = User::create([
            'name' => 'operator',
            'is_admin' => 1,
            'email' => 'operator@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);


        $user = User::create([
            'name' => 'test',
            'is_admin' => 0,
            'email' => 'test@test.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);

        $superAdmin->syncRoles([$superAdminRole])->syncPermissions([
            $userPermissionCreate,
            $userPermissionRead,
            $userPermissionUpdate,
            $userPermissionDelete,

            // ROLE MODEL
            $rolePermissionCreate,
            $rolePermissionRead,
            $rolePermissionUpdate,
            $rolePermissionDelete,

            // Drone MODEL
            $dronePermissionCreate,
            $dronePermissionRead,
            $dronePermissionUpdate,
            $dronePermissionDelete,

            // Satuan Kerja MODEL
            $satuanKerjaPermissionCreate,
            $satuanKerjaPermissionRead,
            $satuanKerjaPermissionUpdate,
            $satuanKerjaPermissionDelete,

            // Asset MODEL
            $assetPermissionCreate,
            $assetPermissionRead,
            $assetPermissionUpdate,
            $assetPermissionDelete,
        ]);

        $admin->syncRoles([$adminRole])->syncPermissions([
            $userPermissionCreate,
            $userPermissionRead,
            $userPermissionUpdate,
            $userPermissionDelete,

            // ROLE MODEL
            $rolePermissionCreate,
            $rolePermissionRead,
            $rolePermissionUpdate,
            $rolePermissionDelete,

            // Drone MODEL
            $dronePermissionCreate,
            $dronePermissionRead,
            $dronePermissionUpdate,
            $dronePermissionDelete,

            // Satuan Kerja MODEL
            $satuanKerjaPermissionCreate,
            $satuanKerjaPermissionRead,
            $satuanKerjaPermissionUpdate,
            $satuanKerjaPermissionDelete,

            // Asset MODEL
            $assetPermissionCreate,
            $assetPermissionRead,
            $assetPermissionUpdate,
            $assetPermissionDelete,
        ]);
    }
}