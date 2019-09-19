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
        foreach ($response->getHeaders() as $header_name => $header_value) {
            header($header_name . ':' . $header_value);
        }
        echo $response->getBody();
    }
}