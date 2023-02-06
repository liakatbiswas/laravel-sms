<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Course;
use App\Models\Grade;
use App\Models\Lead;
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

//     $user = User::create( [
//    'name'     => 'Super Admin',
//    'email'    => 'super@bdcodex.com',
//    'password' => \bcrypt( 12345 ),
//   ] );

  /** Create a role & a permission */
//   $role       = Role::create( ['name' => 'Super Admin'] );
//   $permission = Permission::create( ['name' => 'create-admin'] );
  /** A permission can be assigned to a role */
//   $role->givePermissionTo( $permission );
//   $permission->assignRole( $role );
  /** Give the permission to the user */
//   $user->assignRole( $role );

//   Creating a role, an user & give the permission to the user
//   $communicationRole = Role::create( ['name' => 'Communication'] );
//   $user              = User::create( [
//    'name'     => 'Communication Team',
//    'email'    => 'communication@bdcodex.com',
//    'password' => \bcrypt( 12345 ),
//   ] );
//   $user->assignRole( $communicationRole );

  $this->create_user_with_role( 'Super Admin', 'Super Admin', 'super@bdcodex.com' );
  $this->create_user_with_role( 'Communication', 'Communication Team', 'communication@bdcodex.com' );
  $teacher = $this->create_user_with_role( 'Teacher', 'Teacher', 'teacher@bdcodex.com' );

  /** creating leads */
  Lead::factory()->count( 100 )->create();

  $course = Course::create( [
   'name'        => 'Laravel',
   'description' => 'Lorem ipsum dolor sit amet consectetur adipis turpis libero duis tellus ante imperdiet fames, feugiat viverra ligula id fringilla morbi congue.',
   'image'       => 'https://images.unsplash.com/photo-1575936123452-b67c3203c357?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8aW1hZ2V8ZW58MHx8MHx8&w=1000&q=80',
   'user_id'     => $teacher->id,
  ] );

  Grade::factory( 10 )->create();

 }

 private function create_user_with_role( $type, $name, $email ) {
  $role = Role::create( ['name' => $type] );
  $user = User::create( ['name' => $name, 'email' => $email, 'password' => bcrypt( 12345 )] );

  /** if the user is a Super Admin then give the permission */
  if ( $type == 'Super Admin' ) {
   $permission = Permission::create( ['name' => 'create-admin'] );
   $role->givePermissionTo( $permission );
  }

  $user->assignRole( $role );

  return $user;
 }
}