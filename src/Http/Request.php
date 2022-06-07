<?php

namespace Sang\CarForRent\Http;

use JsonException;

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
    public function getFormParams(): array
    {
        return $_REQUEST;
    }

    public function getParams()
    {
        $path = $_SERVER['REQUEST_URI'];
        $pathComponents = parse_url($path);
        parse_str($pathComponents['query'], $params);
        return $params;
    }

    /**
     * @throws JsonException
     */
    public function getRequestJsonBody(): mixed
    {
        $data = file_get_contents('php://input');

        return json_decode($data, true, 512, JSON_THROW_ON_ERROR);
    }

    /**
     * @return array
     */
    public function getFiles(): array
    {
        return $_FILES;
    }

    /**
     * @return mixed|null
     */
    public function getTokenHeader(): mixed
    {
        return $_SERVER['HTTP_AUTHORIZATION'] ?? null;
    }

}
