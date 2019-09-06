<?php


namespace Skynet\http;


class Request implements IRequest
{
    const TYPE_JSON = 'json';
    public static $request_type = self::TYPE_JSON;

    private $body;
    private $query_params;
    private $uri = '';
    private $path;
    private $method;

    public function __construct()
    {
        $this->body = file_get_contents('php://input');
        $this->query_params = $_GET;
        $this->uri = $_SERVER['REQUEST_URI'];
        $this->method = strtoupper($_SERVER['REQUEST_METHOD']);
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getUri(): string
    {
        return $this->uri;
    }

    public function getPath(): string
    {
        if (is_null($this->path)) {
            $folder_path = str_ireplace('/index.php', '', $_SERVER['SCRIPT_NAME']);
            $this->path = str_ireplace($folder_path, '', $_SERVER['REQUEST_URI']);
        }
        return $this->path;
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