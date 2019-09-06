<?php


namespace Skynet\http;


use Skynet\models\IAction;

class Route implements IRoute
{
    private $method;
    private $url_pattern;
    private $action_class;
    private $token_patterns;

    public function __construct(
        string $method,
        string $url_pattern,
        string $action_class,
        array $token_patterns = []
    ) {
        $this->method = strtoupper($method);
        $this->url_pattern = $url_pattern;
        $this->action_class = $action_class;
        $this->token_patterns = $token_patterns;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getUrlPattern(): string
    {
        return $this->url_pattern;
    }

    public function getActionClass(): string
    {
        return $this->action_class;
    }

    public function getTokenPatterns(): array
    {
        return $this->token_patterns;
    }
}