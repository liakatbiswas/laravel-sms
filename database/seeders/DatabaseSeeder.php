<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
 /**
  * Seed the application's database.
  *
  * @return void
  */
 public function run()
 {
  $user           = new User();
  $user->name     = "liakat";
  $user->email    = 'liakat@bdcodex.com';
  $user->password = bcrypt(1234);
  $user->save();

// Create a role & a permission
  $role       = Role::create(['name' => 'Super Admin']);
  $permission = Permission::create(['name' => 'create-admin']);

//   A permission can be assigned to a role
  $role->givePermissionTo($permission);
  $permission->assignRole($role);

  $user->assignRole($role);

 }
}
