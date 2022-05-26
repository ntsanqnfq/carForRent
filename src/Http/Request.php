<?php

namespace Sang\CarForRent\Http;

class Request
{
    const METHOD_OPTION = 'OPTION';
    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';
    const METHOD_PUT = 'PUT';
    const METHOD_DELETE = 'DELETE';

    /**
     * @return mixed
     */
    public static function requestMethod(): mixed
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    /**
     * @return mixed
     */
    public static function requestUri(): mixed
    {
        return $_SERVER['REQUEST_URI'];
    }
}
