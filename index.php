<?php

use Skynet\exceptions\NotFoundException;
use Skynet\http\Request;
use Skynet\http\Response;
use Skynet\http\ResponseSender;
use Skynet\http\Route;
use Skynet\http\Router;
use Skynet\actions\TarifAction;
use Skynet\actions\TarifsAction;

chdir(dirname(__DIR__));
require_once 'autoload.php';
require_once 'db_cfg.php';

date_default_timezone_set('Europe/Moscow');

$request = new Request();

$router = new Router();

$router->addRoute(new Route(
    'GET',
    '/users/{user_id}/services/{service_id}/tarifs',
    TarifsAction::class,
    ['user_id' => '\\d+', 'service_id' => '\\d+']
));

$router->addRoute(new Route(
    'put',
    '/users/{user_id}/services/{service_id}/tarif',
    TarifAction::class,
    ['user_id' => '\\d+', 'service_id' => '\\d+']
));


try {
    $action = $router->match($request);
    $response = $action->run();
} catch (NotFoundException $e) {
    $response = new Response('', 404);
}

$sender = new ResponseSender();
$sender->send($response);

