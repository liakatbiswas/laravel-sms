## LMS Project- 01

1.  Install Laravel
2.  Connect to Database
3.  Install Breeze:
    >     composer require laravel/breeze --dev
    >     php artisan breeze:install
    >     php artisan migrate
    >     npm install
    >     npm run dev
4.  Install Spatie for Permission:
    >     composer require spatie/laravel-permission
    >     php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
    >     php artisan optimize:clear
    >     php artisan migrate
5.  Install PHP Flasher Laravel:
    >     composer require php-flasher/flasher-laravel
6.  Create Necessary Models & Controllers:
    >     php artisan make:model Lead -mc
    >     php artisan make:model Course -mc
    >     php artisan make:model Grade -mc
    >     php artisan make:model Exam -mc
    >     php artisan make:model Invoice -mc
    >     php artisan make:model InvoiceItem -mc
    >     php artisan make:model Attendance -mc
    >     php artisan make:model HomeWork -mc
    >     php artisan make:model Note -mc
7.  Database schema for necessary fields

## LMS Project- 02

1. Relation
