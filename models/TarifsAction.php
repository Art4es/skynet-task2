<?php


namespace Skynet\models;


use Skynet\http\IResponse;
use Skynet\http\JsonResponse;

class TarifsAction extends Action
{
    public function run(): IResponse
    {
        return new JsonResponse($this->params);
    }
}