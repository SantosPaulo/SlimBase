<?php

require __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
use Noodlehaus\Config;
use Slim\App as Slim;
use Slim\HttpCache\CacheProvider;
use Slim\HttpCache\Cache;
use Slim\Views\{Twig, TwigExtension};
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use App\Http\Controllers\{HomeController, ApiController};
use App\Http\Middlewares\CorsMiddleware;
use Illuminate\Database\Capsule\Manager;
use App\Classes\MySqlConnector;
use RKA\Middleware\IpAddress;

$dotenv = (new Dotenv(__DIR__ . '/../'))->load();
$config = new Config(__DIR__ . '/../configs/index.php');

$app = new Slim([ 'settings' => $config->get('settings') ]);

$container = $app->getContainer();

// service cache
$container['cache'] = function () {
    return new CacheProvider();
};

// Service factory for the ORM
$capsule = new Manager;
$capsule->addConnection($container['settings']['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();

$container['db'] = function ($container) use ($capsule) {
    return $capsule;
};

// set pdo connection for mysql
$container['pdoMysql'] = function ($c) {
    return new MySqlConnector($c['settings']['mysql']);
};

$container['logger'] = function($c) {
    $logger = new Logger('my_logger');
    $file_handler = new StreamHandler(__DIR__ . '/../logs/app.log');
    $logger->pushHandler($file_handler);
    return $logger;
};

// set config as global
$container['config'] = function ($c) use ($config) {
    return $config;
};

// views
$container['view'] = function ($c) {
    $view = new Twig(__DIR__ . '/../resources/views', [
        'cache' => __DIR__ . '/../resources/cache'
    ]);

    // Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $c->get('request')->getUri()->getBasePath()), '/');
    $view->addExtension(new TwigExtension($c->get('router'), $basePath));

    return $view;
};

// Load registered in configs/controllers here.
$controllers = new Config(__DIR__ . '/../configs/controllers.php');

foreach ($controllers->get('controllers') as $key => $controller) {
    $container[$key] = function($c) use ($controller) {
        return new $controller($c);
    };
}

// Override the default Not Found Handler
$container['notFoundHandler'] = function ($c) {
    return function ($request, $response) use ($c) {

        $response = $response->withStatus(404)
                             ->withHeader('Content-Type', 'text/html');

        return $c->view->render($response, 'errors/404.twig');
    };
};

// Override the default Not Allowed Handler
$container['notAllowedHandler'] = function ($c) {
    return function ($request, $response, $methods) use ($c) {
        $response = $response->withStatus(405)
                             ->withHeader('Allow', implode(', ', $methods))
                             ->withHeader('Content-type', 'text/html');
        
        return $c->view->render($response, 'errors/405.twig', [
            'methods' => 'Method must be one of: ' . implode(', ', $methods),
        ]);
    };
};

// Override the default Error Handler
$container['phpErrorHandler'] = function ($c) {
    return function ($request, $response, $error) use ($c) {
        $response =  $response->withStatus(500)
                              ->withHeader('Content-Type', 'text/html');
        return $c->view->render($response, 'errors/500.twig');
    };
};

// Register global middlewares.
$app->add(new CorsMiddleware($container));
$app->add(new Cache('public', 86400));
$app->add(new IpAddress(true, []));

require __DIR__ . '/../routes/api.php';
