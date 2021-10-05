<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\user; //add this
use Spatie\Permission\Models\Role; //add this
use Spatie\Permission\Models\Permission; //add this

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('12345678')
            ]);

        $role = Role::create(['name' => 'Admin']);

        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}
