<?php

namespace Sang\tests\App;

use PHPUnit\Framework\TestCase;
use ReflectionException;
use Sang\CarForRent\App\Application;

class ApplicationTest extends TestCase
{
    /**
     * @runInSeparateProcess
     * @return void
     * @throws ReflectionException
     */
    public function testStart(): void
    {
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_SERVER['REQUEST_URI'] = '/login';
        $_POST['userName'] = 'ntsanq';
        $_POST['password'] = '123';


        $result = new Application();
        $result->start();
        $this->assertNotNull($result);
    }
}
