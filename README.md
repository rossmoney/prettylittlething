# prettylittlething

## How to run
inside project directory

composer install

then 

php artisan products:import

will output how many products were imported, and how many failed / couldn't be imported 

sql is inside products.sql in the route and also migrations are set up for the unit tests

a copy of .env.example need to be made and database settings changed and 
php artisan key:generate run in order to run unit tests

to run unit tests ./vendor/bin/phpunit
