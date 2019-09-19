<?php

namespace Skynet\http;

interface IResponse
{
    public function getProtocolVersion(): string;

    public function getBody();

    public function getStatusCode(): int;

    public function getMessage(): string;

    public function getHeaders(): array;

    public function withHeaders(array $header);
}