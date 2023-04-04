-------------------------------
LMS Project- 01
-------------------------------
01. Install Laravel
-   composer create-project laravel/laravel:^9.5 sms

02. Configration
-   Create a database and configrate it in env file

03. Install Breeze:
-   composer require laravel/breeze --dev
-   php artisan breeze:install
-	  php artisan migrate
-	  npm install
-	  npm run dev

04. Install Spatie for Permission:
-	  composer require spatie/laravel-permission
-	  php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
-	  php artisan optimize:clear
-	  php artisan migrate
-   HasRoles ----------

05. Install PHP Flasher Laravel:
-   composer require php-flasher/flasher-laravel

06. Create Necessary Modals
-   php artisan make:model Lead -mc
-   php artisan make:model Course -mc
-   php artisan make:model Grade -mc
-   php artisan make:model Exam -mc
-   php artisan make:model Invoice -mc
-   php artisan make:model InvoiceItem -mc
-   php artisan make:model Attendance -mc
-   php artisan make:model HomeWork -mc
-   php artisan make:model Note -mc

07. Leads migration
-   $table->string('name')->nullable();
-   $table->string('phone');
-   $table->string('email')->nullable();

08. Courses migration
-   $table->string( 'name' );
-   $table->string( 'description' );
-   $table->string( 'image' );

09. Grades migration
-   $table->unsignedBigInteger( 'number' );
-   $table->foreignId( 'course_id' )->constrained()->cascadeOnDelete();

10. Exams migration
-   $table->string('name');
-   $table->foreignId('course_id')->constrained()->cascadeOnDelete();
-   $table->text('description');

11. Invoices migration
-   $table->dateTime( 'due_date' );
-   $table->dateTime( 'paid_date' )->nullable();
-   $table->foreignId( 'user_id' )->constrained()->cascadeOnDelete();

12. Invoice_items migration
-   $table->string('name');
-   $table->float('price');
-   $table->unsignedBigInteger('quantity');
-   $table->foreignId('invoice_id')->constrained()->cascadeOnDelete();

13. Attendances migration
-   $table->foreignId('grade_id')->constrained()->cascadeOnDelete();
-   $table->foreignId('user_id')->constrained()->cascadeOnDelete();

14. Home_works migration
-   $table->string( 'name' );
-   $table->string( 'description' );
-   $table->unsignedBigInteger( 'grade_id' )->default( 0 );
-   $table->unsignedBigInteger( 'exam_id' )->default( 0 );
-   $table->unsignedBigInteger( 'user_id' );
-   $table->string( 'link' );
-   $table->foreign( 'grade_id' )->references( 'id' )->on( 'grades' )->onDelete( 'cascade' );
-   $table->foreign( 'exam_id' )->references( 'id' )->on( 'exams' )->onDelete( 'cascade' );
-   $table->foreign( 'user_id' )->references( 'id' )->on( 'users' )->onDelete( 'cascade' );

15. Notes migration
-   $table->text( 'description' );
-   $table->unsignedBigInteger( 'grade_id' )->nullable();
-   $table->unsignedBigInteger( 'exam_id' )->nullable();
-   $table->unsignedBigInteger( 'user_id' )->nullable();
-   $table->unsignedBigInteger( 'lead_id' )->nullable();
-   $table->foreign( 'grade_id' )->references( 'id' )->on( 'grades' )->onDelete( 'cascade' );
-   $table->foreign( 'exam_id' )->references( 'id' )->on( 'exams' )->onDelete( 'cascade' );
-   $table->foreign( 'user_id' )->references( 'id' )->on( 'users' )->onDelete( 'cascade' );
-   $table->foreign( 'lead_id' )->references( 'id' )->on( 'leads' )->onDelete( 'cascade' );


-------------------------------
LMS Project- 02
-------------------------------
01. In User.php
 public function invoices() {
  return $this->hasMany( Invoice::class );
 }

02. In Lead.php
 public function notes() {
  return $this->hasMany( Note::class );
 }

03. In Invoice.php
 public function items() {
  return $this->hasMany( InvoiceItem::class );
 }

04. In Exam.php
 public function homeworks() {
  return $this->hasMany( HomeWork::class );
 }

04. In Grade.php
 public function homeworks()
 {
  return $this->hasMany(HomeWork::class);
 }

 public function attendance()
 {
  return $this->hasMany(Attendance::class);
 }

 05. In Course.php
  public function grades()
 {
  return $this->hasMany(Grade::class);
 }

06. User HasRoles in User.php
07. In DatabaseSeeder.php
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

08. প্রত্যেকটা operation হচ্ছে  permission. operation গুলোর সমষ্টি হচ্ছে একটা role. একটা role কে একটা user এর সাথে assign


<!-- 05. Exam.php...................
  public function homeworks()
 {
  return $this->hasMany(HomeWork::class);
 }

 public function up() {
  Schema::create( 'exams', function ( Blueprint $table ) {
   $table->foreignId( 'course_id' )->constrained()->cascadeOnDelete(); // রাসেল ভাই, এখানে grade_id use করেছেন
  } );
 } -->
