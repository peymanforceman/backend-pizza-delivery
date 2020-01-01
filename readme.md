### Quiz Maker , Perspective Tool
This is a technical challenge for `innoscripta.com`

Description : This project includes the backend and APIs of a pizza online ordering service + All Unit and Feature Tests.

The project made by Laravel 6.2.

The project includes the following features:

- Show A List of Available Categories and Products
- User Register / Login / Logout
- User Order Pizza
- User Check Order
- User Previous Orders History

### How to setup
1. run command : `composer install`
2. run command : `npm install`
3. create two databases for `Web Service` & `Testing Environment`
4. change `.env.example` File to `.env` and setup .env database information
5. change `.env.example` File to `.env.testing` and setup .env.testing database information for Unit & Feature Tests
6. run command : `php artisan key:generate`
7. run command : `php artisan migrate`
8. run command : `php artisan jwt:generate`
9. run command : `php artisan db:seed`
10. run command : `php artisan serve`
11. open web server

Done !

### Setup Unit & Feature Testing Environment

- step1: create a new database for test
- step2: change `.env.example` File to `.env.testing` and setup .env.testing database information for Unit & Feature Tests
- run command :  `phpunit`
