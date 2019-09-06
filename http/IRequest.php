<?php

namespace Skynet\http;

interface IRequest
{
    public function getMethod(): string;

    public function getUri(): string;

    public function getPath(): string;

    public function getQueryParam(): array;

    public function getParsedBody();

    public function getBody();

}