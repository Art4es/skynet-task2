<?php

use Skynet\http\Request;
use Skynet\http\Route;
use Skynet\http\Router;
use Skynet\models\TarifAction;
use Skynet\models\TarifsAction;

chdir(dirname(__DIR__));
require_once 'autoload.php';

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

$action = $router->match($request);

echo $action->run()->getBody();
