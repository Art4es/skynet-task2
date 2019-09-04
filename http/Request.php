<?php


namespace Skynet\http;


class Request implements IRequest
{
    const TYPE_JSON = 'json';
    public static $request_type = self::TYPE_JSON;

    private $body;
    private $query_params;

    public function __construct()
    {
        $this->body = file_get_contents('php://input');
        $this->query_params = $_GET;
    }

    public function getUrl()
    {
        return $_SERVER['REQUEST_URI'];
    }

    public function getQueryParam(): array
    {
        return $this->query_params;
    }

    public function getParsedBody()
    {
        return $this->parseBody();
    }

    public function getBody()
    {
        return $this->body;
    }

    private function parseBody()
    {
        switch (self::$request_type) {
            case self::TYPE_JSON:
                return json_decode($this->getBody(), true);
        }
    }
}