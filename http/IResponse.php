<?php

namespace Skynet\http;

interface IResponse
{
    public function getProtocolVersion(): string;

    public function getBody();

    public function getStatusCode(): int;

    public function getMessage(): string;
}