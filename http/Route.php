<?php


namespace Skynet\http;


use Skynet\models\IAction;

class Route implements IRoute
{
    private $method;
    private $url;
    private $action;


    public function getMethod(): string
    {
        return $this->method;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getAction(): IAction
    {
        return new $this->action();
    }
}