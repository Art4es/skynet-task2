<?php


namespace Skynet\http;


use Skynet\models\IAction;

interface IRouter
{
    public function match(IRequest $request): IAction;

    public function addRoute(IRoute $route);
}