<?php


namespace Skynet\actions;


use Skynet\http\IResponse;
use Skynet\http\Response;

class TarifAction extends Action
{
    public function run(): IResponse
    {
        $post_data = $this->request->getParsedBody();
        print_r($post_data);
        return new Response($post_data);
    }
}