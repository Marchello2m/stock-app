<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

This project is made using Laravel v8 and MySql 5.7.35/PHP v7.4 to show https://finnhub.io/ data and do virtual actions with stocks.

To get it working, follow these steps:

Fork this repo

in projects root folder rename ".env.example" to ".env" and fill these lines:

DB_DATABASE=

DB_USERNAME=

DB_PASSWORD=

FINNHUB_API_KEY= (register in finnhub.io and get your API key)

make empty databse (charset:"utf8mb4", collation: "utf8mb4_unicode_ci") with the name what entered in "DB_DATABASE=",

open in consele projects directory and use these two commands to install dependencies: npm install composer install

run:

php artisan migrate

to check status of migrations

php artisan migrate:status

run server with command

php artisan serve
 
