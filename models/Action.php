<?php


namespace Skynet\models;


use Skynet\http\IRequest;

abstract class Action implements IAction
{
    protected $params;
    protected $request;

    public function __construct(IRequest $request, array $params = [])
    {
        $this->request = $request;
        $this->params = $params;
    }
}