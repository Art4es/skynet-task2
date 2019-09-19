<?php


namespace Skynet\http;


class JsonResponse extends Response
{
    public function __construct($body, $status = 200)
    {
        parent::__construct($body, $status);
        $this->withHeaders(['Content-Type' => 'application/json']);
    }

    public function getBody()
    {
        return json_encode(parent::getBody());
    }
}