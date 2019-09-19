<?php


namespace Skynet\http;


class Response implements IResponse
{
    private $body;
    private $statusCode;
    private $message = '';
    private $headers = [];

    private static $statuses = [
        200 => 'OK',
        404 => 'Not Found'
    ];

    public function __construct($body, $status = 200)
    {
        $this->body = $body;
        $this->statusCode = $status;
    }

    public function getProtocolVersion(): string
    {
        return '1.1';
    }

    public function getBody()
    {
        return $this->body;
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function getMessage(): string
    {
        if (!isset($this->message) && !isset(self::$statuses[$this->statusCode])) {
            $this->message = self::$statuses[$this->statusCode];
        }
        return $this->message;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function withHeaders(array $header)
    {
        $this->headers = array_merge($this->headers, $header);
    }
}