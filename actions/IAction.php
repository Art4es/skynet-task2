<?php

namespace Skynet\actions;


use Skynet\http\IResponse;

interface IAction
{
    public function run(): IResponse;
}