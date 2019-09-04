<?php


namespace Skynet\http;


class Response implements IResponse
{
    private $body;
    private $statusCode;
    private $message = '';

    private static $statuses = [
        200 => 'OK'
    ];

    public function __construct($body, $status = 200)
    {
        $this->body = $body;
        $this->statusCode = $status;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        if (!isset($this->message) && !isset(self::$statuses[$this->statusCode])) {
            $this->message = self::$statuses[$this->statusCode];
        }
        return $this->message;
    }

}