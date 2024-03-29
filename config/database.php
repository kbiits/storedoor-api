<?php

use Illuminate\Support\Str;

$DATABASE_URL = parse_url("postgres://lxbzzromnasspv:8bc4e5693677248bc5049cfc4c6e7ea14fc1a02e0a8dafc5469963180cc62158@ec2-54-155-87-214.eu-west-1.compute.amazonaws.com:5432/d6ct4jl4h3vdjn");

return [

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for all database work. Of course
    | you may use many connections at once using the Database library.
    |
    */

    'default' => env('DB_CONNECTION', 'pgsql'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the database connections setup for your application.
    | Of course, examples of configuring each database platform that is
    | supported by Laravel is shown below to make development simple.
    |
    |
    | All database work in Laravel is done through the PHP PDO facilities
    | so make sure you have the driver for your particular database of
    | choice installed on your machine before you begin development.
    |
    */

    'connections' => [

        'sqlite' => [
            'driver' => 'sqlite',
            'url' => env('DATABASE_URL'),
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
            'prefix' => '',
            'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true),
        ],

        'mysql' => [
            'driver' => 'mysql',
            'url' => env('DATABASE_URL'),
            // 'host' => env('DB_HOST', 'db4free.net'),
            'host' => env('DB_HOST', 'db4free.net'),
            // 'port' => env('DB_PORT', '3306'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'storedoor'),
            // 'database' => env('DB_DATABASE', 'storedoor'),
            'username' => env('DB_USERNAME', 'storedoor'),
            // 'username' => env('DB_USERNAME', 'storedoor'),
            'password' => env('DB_PASSWORD', 'storedoor123123'),
            // 'password' => env('DB_PASSWORD', 'storedoor123123'),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],
        'pgsql' => [
            'driver' => 'pgsql',
            'url' => env('DATABASE_URL'),
            // 'host' => 'ec2-54-205-183-19.compute-1.amazonaws.com',
            // 'port' => '5432',
            // 'database' => 'dcve7qjk3fr38d',
            // 'username' => 'dbvrutqvnaacza',
            // 'password' => '3cc3fb660efe14ffc2847b0ae1f4a8e1cc40ee169659cce7d1c8d8b8afea7607',
            // 'host' => env('DB_HOST', '127.0.0.1'),
            // 'port' => env('DB_PORT', '5432'),
            // 'database' => env('DB_DATABASE', 'storedoor'),
            // 'username' => env('DB_USERNAME', 'nabiel'),
            // 'password' => env('DB_PASSWORD', 'nabiel'),
            'host' => env('DB_HOST', $DATABASE_URL["host"]),
            'port' => env('DB_PORT', $DATABASE_URL["port"]),
            'database' => env('DB_DATABASE', ltrim($DATABASE_URL["path"], '/')),
            'username' => env('DB_USERNAME', $DATABASE_URL["user"]),
            'password' => env('DB_PASSWORD', $DATABASE_URL["pass"]),
            'charset' => 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,
            'schema' => 'storedoor',
            'sslmode' => 'prefer',
        ],

        'sqlsrv' => [
            'driver' => 'sqlsrv',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '1433'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run in the database.
    |
    */

    'migrations' => 'migrations',

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer body of commands than a typical key-value system
    | such as APC or Memcached. Laravel makes it easy to dig right in.
    |
    */

    'redis' => [

        'client' => env('REDIS_CLIENT', 'phpredis'),

        'options' => [
            'cluster' => env('REDIS_CLUSTER', 'redis'),
            'prefix' => env('REDIS_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_') . '_database_'),
        ],

        'default' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_DB', '0'),
        ],

        'cache' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_CACHE_DB', '1'),
        ],

    ],

];
