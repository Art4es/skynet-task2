<?php


namespace Skynet\http;


interface IRoute
{
    public function getMethod(): string;

    public function getUrlPattern(): string;

    public function getTokenPatterns(): array;

    public function getActionClass(): string;

}