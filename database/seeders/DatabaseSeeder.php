<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder {
 /**
  * Seed the application's database.
  *
  * @return void
  */
 public function run() {
  $user = User::create( [
   'name'     => 'Super Admin',
   'email'    => 'super@sms.test',
   'password' => bcrypt( 1234 ),
  ] );

  $role = Role::create( [
   'name' => 'Super Admin',
  ] );

  $permission = Permission::create( [
   'name' => 'create-admin',
  ] );

  $role->givePermissionTo( $permission );
  $permission->assignRole( $role );

  $user->assignRole( $role );
 }

}