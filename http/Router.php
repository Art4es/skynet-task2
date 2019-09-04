<?php


namespace Skynet\http;


use Skynet\models\IAction;

class Router implements IRouter
{
    /** @var IRoute[] */
    private $routes = [];

    public function match(IRequest $request): IAction
    {
        $route = reset($this->routes);
        return $route->getAction();
    }

    public function addRoute(IRoute $route)
    {
        $this->routes[] = $route;
    }
}