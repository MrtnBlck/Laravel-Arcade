php artisan serve
php artisan storage:link
php artisan make:controller EventController -r
php artisan migrate:fresh --seed

php artisan make:model Vehicle -fms
php artisan make:model Event -fms
php artisan make:model Search -fms

php artisan make:migration create_event_vehicle_table

php artisan make:controller VehicleController -r
php artisan make:controller SearchController -r

