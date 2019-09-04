<?php


namespace Skynet\http;


use Skynet\models\IAction;

interface IRoute
{
    public function getMethod(): string;

    public function getUrl(): string;

    public function getAction(): IAction;

}