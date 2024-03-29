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
  // 'user-management'
  $defaultsPermissions = ['create-admin', 'lead-management'];
  foreach ( $defaultsPermissions as $permission ) {
   Permission::create( ['name' => $permission] );
  }

  $this->create_user_with_role( 'Super Admin', 'Super Admin', 'super@sms.test', '1234' );
  $this->create_user_with_role( 'Communication', 'Communication Team', 'communication@sms.test', '1234' );
  $teacher = $this->create_user_with_role( 'Teacher', 'Teacher', 'teacher@sms.test', '1234' );
  $this->create_user_with_role( 'Leads', 'Leads', 'leads@sms.test', '1234' );

//   Creating Lead
  Lead::factory( 100 )->create();

//   Creating Course
  $course = Course::create( [
   'name'        => 'Laravel',
   'description' => 'Lorem ipsum dolor sit amet consectetur adipiscing elit vitae, sodales fringilla ultricies platea placerat aliquam nam donec urna, prim quam. Eget vestibulum phasellus mattis volutpat, quisque nisl.',
   'image'       => 'https://picsum.photos/300?random=' . rand( 1, 22424 ),
   'user_id'     => $teacher->id,
  ] );

  Grade::factory( 10 )->create();

 }
 private function create_user_with_role( $type, $name, $email, $password ) {
  $role = Role::create( ['name' => $type] );
  $user = User::create( ['name' => $name, 'email' => $email, 'password' => bcrypt( $password )] );

  /** if the user is a Super Admin then give the permission */
  if ( $type == 'Super Admin' ) {
   $role->givePermissionTo( Permission::all() );
  } elseif ( $type == 'Leads' ) {
   $role->givePermissionTo( 'lead-management' );
  }

  $user->assignRole( $role );
  return $user;
 }
}