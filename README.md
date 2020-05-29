## About Laravel-auth

This project is a simple website which use laravel elements to make a user system.
It covers some different things :
  * Authentication
  * Registration
  * Logout
  * Gates
  * Template separation
  * Administration (to use roles and access restrictions)

## Needs (what I used)

  * PHP 7.2.5 or more;
  * more on [laravel documentation][1].

## Installation

Get the project from github:

```bash
$ git clone https://github.com/aloyonnet/laravel-auth.git
```

Install the dependencies:

```bash
$ composer install
```

link your app to a database:<br>
create a copy of .env.example rename it .env and open it
```bash
/.env
$ DB_CONNECTION=...
$ DB_HOST=.........
$ DB_PORT=.........
$ DB_DATABASE=.....
$ DB_USERNAME=.....
$ DB_PASSWORD=.....
```

create the content of the database:
```bash
$ php artisan make:migration
$ php artisan migrate
```

Use
-----
for non production use, you can launch a server (with <https://localhost:8000> by default) using :

```bash
$ cd my_project
$ php artisan serve
```

if you try on remote and the command don't work use :

```bash
$ cd my_project
$ php artisan serve --host [your_ip_here]
```

If laravel binary is not installed, you can replace the command with: 
`php -S localhost:8000`

Data fixtures :
```bash
$ php artisan db:seed
```

[1]: https://laravel.com/docs
