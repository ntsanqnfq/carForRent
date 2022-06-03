<?php

namespace Sang\tests\Http;


use PHPUnit\Framework\TestCase;
use Sang\CarForRent\Http\Request;

class RequestTest extends TestCase
{
    public function testRequestMethod()
    {
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $request = new Request();
        $result = $request->requestMethod();
        $this->assertEquals('POST', $result);

    }
}
