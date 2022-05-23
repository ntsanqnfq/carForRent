<?php

namespace Sang\CarForRent\Http;

class Request
{
    CONST METHOD_OPTION = 'OPTION';
    CONST METHOD_GET = 'GET';
    CONST METHOD_POST = 'POST';
    CONST METHOD_PUT = 'PUT';
    CONST METHOD_DELETE = 'DELETE';

    public static function requestMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public static function requestUri()
    {
        return $_SERVER['REQUEST_URI'];
    }
}