<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $adminUser = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'usertype' => 'super_admin',
            'password' => 'admin123'
        ]);

        $storeAdminRole = Role::create(['name' => 'store_admin']);
        $supplierAdminRole = Role::create(['name' => 'supplier_admin']);
        $superAdminRole = Role::create(['name' => 'super_admin']);
        $allPermissions = [
            'create brand', 'read brand', 'update brand', 'delete brand',
            'create model', 'read model', 'update model', 'delete model',
            'create product', 'read product', 'update product', 'delete product', 'view reviews',
            'create supplier', 'read supplier', 'update supplier', 'delete supplier',
            'create supplier_purchase', 'read supplier_purchase', 'update supplier_purchase', 'delete supplier_purchase',
            'view customer list', 'view purchases', 'crud admin'
        ];

        // Define permissions
        $storePermissions = [
            'create brand', 'read brand', 'update brand', 'delete brand',
            'create model', 'read model', 'update model', 'delete model',
            'create product', 'read product', 'update product', 'delete product', 'view reviews'
        ];

        $supplierPermissions = [
            'create supplier', 'read supplier', 'update supplier', 'delete supplier',
            'create supplier_purchase', 'read supplier_purchase', 'update supplier_purchase', 'delete supplier_purchase',
        ];

        $superAdminPermissions = array_merge(
            ['view customer list', 'view purchases', 'crud admin'],
            $storePermissions,
            $supplierPermissions
        );


        // Create permissions and associate them with roles
        foreach ($allPermissions as $permissionName) {
            Permission::create(['name' => $permissionName]);
        }

        // Assign permissions to roles
        $storeAdminRole->givePermissionTo($storePermissions);
        $supplierAdminRole->givePermissionTo($supplierPermissions);
        $superAdminRole->givePermissionTo($superAdminPermissions);
        $adminUser->assignRole('super_admin');
    }
}
