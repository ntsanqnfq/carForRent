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
    public function getRequestMethod(): mixed
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    /**
     * @return mixed
     */
    public function getRequestUri(): mixed
    {
        return $_SERVER['REQUEST_URI'];
    }

    /**
     * @return bool
     */
    public function isGet(): bool
    {
        if ($this->getRequestMethod() === self::METHOD_GET) {
            return true;
        }
        return false;
    }

    /**
     * @return bool
     */
    public function isPost(): bool
    {
        if ($this->getRequestMethod() === self::METHOD_POST) {
            return true;
        }
        return false;
    }

    /**
     * @return array
     */
    public function formParams(): array
    {
        return $_REQUEST;
    }
}
