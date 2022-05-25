<?php

namespace Sang\tests\App;

use PHPUnit\Framework\TestCase;
use ReflectionException;
use Sang\CarForRent\App\Application;

class ApplicationTest extends TestCase
{
    /**
     * @return void
     * @throws ReflectionException
     */
    public function testStart()
    {
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_SERVER['REQUEST_URI'] = '/login';
        
        $result = new Application();
        $result->start();
        $this->assertNotNull($result);
    }


}