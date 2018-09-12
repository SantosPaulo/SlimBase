<?php

return [
    'settings' => [

        // enable slim debug mode
        'displayErrorDetails' => env('APP_DISPLAY_ERRORS'),

        // logger settings
        'logger' => [
            'name'  => env('LOGGER_NAME'),
            'level' => \Monolog\Logger::DEBUG,
            'path'  => __DIR__ . '/../logs/app.log',
        ],

        'twig' => [
            'viewsPath' => __DIR__ . '/../resources/views',
            'cachePath' => __DIR__ . '/../resources/cache',
        ],

        // elequent settings
        'db' => [
            'driver'    => env('DB_DRIVER'),
            'host'      => env('DB_DRIVER'),
            'database'  => env('DB_DATABASE'),
            'username'  => env('DB_USERNAME'),
            'password'  => env('DB_PASSWORD'),
            'charset'   => env('DB_CHARSET'),
            'collation' => env('DB_COLLATION'),
            'prefix'    => env('DB_PREFIX'),
        ],

        // pdo mysql
        'mysql' => [
            'dbname'   => env('MYSQL_DBNAME'),
            'host'     => env('MYSQL_HOST'),
            'username' => env('MYSQL_USERNAME'),
            'password' => env('MYSQL_PASSWORD'),
        ],
    ],
];
