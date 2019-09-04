<?php


namespace Skynet\http;


class JsonResponse extends Response
{
    
    public function getBody()
    {
        return json_encode(parent::getBody());
    }
}