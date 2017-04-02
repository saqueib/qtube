## qTube

### Installation 
1. To install this app clone the repo 
```
git clone https://github.com/saqueib/qtube.git
cd qtube
```
2. Install the dependencies
```
composer install
npm install
gulp
```
3. After that, setup db connection in `.env` file
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```
4. Now Run the seed command to setup the dummy data
```
php artisan db:seed
```
5. App is ready you can run `php artisan serve` and run the demo
----
### Youtube like app with Vue.js and Laravel
To follow tutorial of building this app visit [here](youtube-like-app-with-vue-js-and-laravel)

### Create REST API with authentication using Laravel Passport
Create REST API with authentication using Laravel Passport for a youtube like app using vue.js as front end.
 Tutorial is covered [here](http://www.qcode.in/create-rest-api-authentication-using-laravel-passport/)

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).