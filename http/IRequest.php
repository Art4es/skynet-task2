<?php

namespace Skynet\http;

interface IRequest
{
    public function getUrl();

    public function getQueryParam(): array;

    public function getParsedBody();

    public function getBody();

}