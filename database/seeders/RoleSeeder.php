<?php

namespace Database\Seeders;

use App\Enums\PermissionsEnum;
use App\Enums\RolesEnum;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $adminRole = Role::create(['name' => RolesEnum::Admin->value]);
        $vendorRole = Role::create(['name' => RolesEnum::Vendor->value]);
        $userRole = Role::create(['name' => RolesEnum::User->value]);


        $approvedVendorsPermission = Permission::create(['name' => PermissionsEnum::ApprovedVendors->value]);
        $sellProductsPermission = Permission::create(['name' => PermissionsEnum::SellProducts->value]);
        $buyProductsPermission = Permission::create(['name' => PermissionsEnum::BuyProducts->value]);


        $adminRole->syncpermissions([
            $approvedVendorsPermission,
            $sellProductsPermission,
            $buyProductsPermission
        ]);
        $vendorRole->syncpermissions([
            $sellProductsPermission,
            $buyProductsPermission
        ]);
        $userRole->syncpermissions([$buyProductsPermission]);


    }
}
