<?php


namespace Skynet\models;


use Skynet\http\IResponse;
use Skynet\http\JsonResponse;

class TarifAction extends Action
{
    public function run(): IResponse
    {
        $post_data = $this->request->getParsedBody();
        print_r($post_data);
        return new JsonResponse($post_data);
    }
}