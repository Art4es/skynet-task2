<?php

namespace Skynet\models;


use Skynet\http\IResponse;

interface IAction
{
    public function run(): IResponse;
}