<?php

use App\Controllers\HomeController;
use App\Controllers\PersonsController;
use App\Repositories\Persons\JsonPersonsRepository;
use App\Repositories\Persons\MySQLPersonsRepository;
use App\Repositories\Persons\PersonsRepository;
use App\Services\Persons\StorePersonService;
use League\Container\Container;

require_once '../vendor/autoload.php';

////////////// CONTAINER ////////////////////////
$container = new Container;
$container->add(PersonsRepository::class,JsonPersonsRepository::class );
$container->add(StorePersonService::class, StorePersonService::class)
    ->addArgument(PersonsRepository::class);
$container->add(PersonsController::class, PersonsController::class)
    ->addArgument(StorePersonService::class);

$container->add(HomeController::class,HomeController::class);




/////////////// ROUTS ///////////////////////////
$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/', [HomeController::class,'index']);
    $r->addRoute('GET', '/persons', [PersonsController::class,'index']);
    $r->addRoute('POST', '/persons', [PersonsController::class,'store']);


});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        [$controller,$method] = $handler;
       echo $container->get($controller)->$method($vars);

        break;
}