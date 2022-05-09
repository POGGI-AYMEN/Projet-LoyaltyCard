<?php

class Response
{
    final public static function json($statusCode, array $headers, $body)
    {
        header("Content-Type: application/json");

        foreach ($headers as $headerName => $headerValue) {
            header("$headerName: $headerValue");
        }

        http_response_code($statusCode);

        return json_encode($body);
    }
}