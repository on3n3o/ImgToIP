<p align="center"><img src="http://ulanelectronics.pl/wp-content/uploads/2019/10/ImgToIP.png" width="400"></p>

<p align="center">
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About ImgToIP

ImgToIP is a web application to track requests and IP's of viewed images through link or email html insert. It's based on Laravel Framework 6.0.

You are free to contribute to this project through pull requests.

## Setup

LAMP Webserver set for Laravel project with PHP7.2 Apache2 and mysql

## Installation

```
git clone https://github.com/on3n3o/ImgToIP.git
cp .env.example .env
```
Edit the variables of new file .env like:
```
APP_NAME=MyName
...
APP_URL=http://myurltothiswebserver
...
DB_DATABASE=somedatabase
DB_USERNAME=someuserofdatabase
DB_PASSWORD=somepasswordofuserofdatabase
```

then

```
composer install
php artisan storage:link
php artisan migrate
```

## Simple admin

Admin can view every image posted.

Setting admin on User with id 1:

`php artisan tinker`
```
use App\User;
$user = User::find(1);
$user->is_admin = true;
$user->save();
```
## Considerations

You should consider changing the filesystems.php and Storage options to local if you don't want your uploads to be public.

## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).

The ImgToIP web application is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
