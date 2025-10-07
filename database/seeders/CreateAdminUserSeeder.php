<?php


namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;




class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         //Admin Seeder
         $user = User::create([
            'name' => 'Kimenyi Honore',
            'email' => 'honore.kimenyi@gmail.com',
            'password' => bcrypt('12345678'),
            'status' =>1,
            'Roles'=>'Admin'
        ]);

        $role = Role::create(['name' => 'Admin']);

        $permissions = Permission::pluck('id','id')->all();
        $permissions = array_diff($permissions, ['view-co-operative']);

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);

        
    }

    }

