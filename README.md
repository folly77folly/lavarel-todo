# Laravel Todo App

This is a simple ToDo app with multiple user support.

This is built on Laravel Framework 7.29.

## Installation

Clone the repository-
```
git clone https://github.com/folly77folly/laravel-todo.git
```

Then cd into the folder with this command-
```
cd laravel-todo
```

Then do a composer install
```
composer install
```

Then create a environment file using this command-
```
cp .env.example .env
```

Then edit `.env` file with appropriate credential for your database server. Just edit these two parameter(`DB_USERNAME`, `DB_PASSWORD`).

Then create a database named `laravel-todo` and then do a database migration using this command-
```
php artisan migrate
```


At last generate application key, which will be used for password hashing, session and cookie encryption etc.
```
php artisan key:generate
```

## Run server

Run server using this command-
```
php artisan serve
```

Then go to `http://localhost:8000` from your browser and see the app.

## Ask a question?

If you have any query please contact at iamaqim@gmail.com

## Screenshot

![Create New ToDo](/screenshots/Opera_Snapshot_2020-11-30_222315_127.0.0.1.png)
![Completed ToDo List](/screenshots/Opera_Snapshot_2020-11-30_222315_127.0.0.1.png)