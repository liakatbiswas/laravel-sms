## LMS Project- 01

1.  Install Laravel
2.  Connect to Database
3.  Install Breeze:
    > composer require laravel/breeze --dev
    > php artisan breeze:install
    > php artisan migrate
    > npm install
    > npm run dev
4.  Install Spatie for Permission:
    > composer require spatie/laravel-permission
    > php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
    > php artisan optimize:clear
    > php artisan migrate
5.  Install PHP Flasher Laravel:
    > composer require php-flasher/flasher-laravel
6.  Create Necessary Models & Controllers:
    > php artisan make:model Lead -mc
    > php artisan make:model Course -mc
    > php artisan make:model Grade -mc
    > php artisan make:model Exam -mc
    > php artisan make:model Invoice -mc
    > php artisan make:model InvoiceItem -mc
    > php artisan make:model Attendance -mc
    > php artisan make:model HomeWork -mc
    > php artisan make:model Note -mc
7.  Database schema for necessary fields

## LMS Project- 02

1.  User.php...................
    public function invoices()
    {
    return $this->hasMany(Invoice::class);
    }
2.  Lead.php...................
    public function notes()
    {
    return $this->hasMany(Note::class);
    }
3.  Invoice.php...................
    public function items()
    {
    return $this->hasMany(InvoiceItem::class);
    }
4.  Grade.php...................
    public function homeworks()
    {
    return $this->hasMany(HomeWork::class);
    }
    public function attendance()
    {
    return $this->hasMany(Attendance::class);
    }
5.  Exam.php...................
    public function homeworks()
    {
    return $this->hasMany(HomeWork::class);
    }
6.  Course.php...................
    public function grades()
    {
    return $this->hasMany(Grade::class);
    }

## LMS Project- 03

1.  Install livewire:
    > composer require livewire/livewire
2.  Add the code in head & body:
    > @livewireStyles
    > @livewireScripts
3.  Create a component:
    > php artisan make:livewire counter
    > Note: By creating a component there will create two directory in laravel.
4.  Add notification by PHP Flasher: flash()->addSuccess("Number is increased by One!");
