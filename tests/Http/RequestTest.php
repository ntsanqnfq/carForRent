<?php

namespace Sang\tests\Http;

use PHPUnit\Framework\TestCase;
use Sang\CarForRent\Http\Request;

class RequestTest extends TestCase
{
    public function testGetRequestMethod()
    {
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $request = new Request();
        $result = $request->getRequestMethod();
        $this->assertEquals('POST', $result);
    }

    public function testGetRequestUri()
    {
        $_SERVER['REQUEST_URI'] = '/login';
        $request = new Request();
        $result = $request->getRequestUri();
        $this->assertEquals('/login', $result);
    }
    public function testIsPostTrue()
    {
        $request = new Request();
        $this->assertTrue($request->isPost());
    }

    public function testIsPostFalse()
    {
        $request = new Request();
        $this->assertFalse($request->isPost());
    }

    public function testGetFormParams(){
        $request  = new Request();
    }
}
