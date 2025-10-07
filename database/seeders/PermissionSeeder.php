<?php

namespace Database\Seeders;
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
        //
// Adding the role and permmission of our system
//user_permisions
$permissions =[
//users permisions
    'view-users-admin',
    'view-users-province',
    'view-users-districts',
    'view-users-sector',

//bins_permisions

    'view-bins-admin',
    'view-bins-province',
    'view-bins-districts',
    'view-bins-sector',
    'view-bins-cell',



//bin_conditions_permitions
    'view-binconditions',
    'create-binconditions',
    'edit-binconditions',
    'delete-binconditions',
    'view-bin_locations',
    'create-bin_locations',
    'edit-bin_locations',
    'delete-bin_locations',





    //crud for roles
    'view-roles-admin',
    'view-roles-province',
    'view-roles-districts',
    'view-roles-sector',
    'view-roles-cell',
//co-operatives

    'view-co-operatives',
    'view-co-operative',




]

;

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }


    }
}

// roles we are having

// $adminRole = Role::firstOrcreate(['name' => 'Admin']);
// $vermiculturistRole = Role::firstOrcreate(['name' => 'vermiculturist']);
// $managerRole = Role::firstorcreate(['name'=> 'coperativeManager']);
// $sedoRole = Role::firstorcreate(['name' => 'Sedo']);
// $sectorAgronomyRole =Role::firstorcreate(['name'=>'sectorAgronomy']);
// $districtAgronomyRole =Role::firstorcreate(['name'=>'districtAgronomy']);
// $provinceAgronomyRole =Role::firstorcreate(['name'=>'provinceAgronomy']);

// $adminRole = Role::firstOrcreate(['name' => 'Admin']);


// giving addimin permissions


// $adminRole->givePermissionTo([

// users
    // 'create-users',
    // 'edit-users',
    // 'delete-users',

//bins

    // 'create-bins',
    // 'edit-bins',
    // 'delete-bins',

// bin_conditions

    // 'create-binconditions',
    // 'edit-binconditions',
    // 'delete-binconditions',


//bin_location

    // 'create-bin_locations',
    // 'edit-bin_locations',
    // 'delete-bin_locations',


//worm types permisions

//     'create-worm_types',
//     'edit-worm_types',
//     'delete-worm_types',

// ]);


// giving vermiculturist permisions


// $vermiculturistRole->givePermissionTo([


//bins

    // 'create-bins',
    // 'edit-bins',
    // 'delete-bins',

// bin_conditions

    // 'create-binconditions',
    // 'edit-binconditions',
    // 'delete-binconditions',

//bin_location

    // 'create-bin_locations',
    // 'edit-bin_locations',
    // 'delete-bin_locations',


//worm types permisions

//     'create-worm_types',
//     'edit-worm_types',
//     'delete-worm_types',


// ]);

