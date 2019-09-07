<?php


namespace Skynet\http;


class ResponseSender
{
    public function send(IResponse $response)
    {
        header(
            'HTTP/' . $response->getProtocolVersion()
            . ' ' . $response->getStatusCode()
            . ' ' . $response->getMessage()
        );
        echo $response->getBody();
    }
}