<?php

namespace Sang\tests\Controller;

use PHPUnit\Framework\TestCase;
use Sang\CarForRent\Controller\HomeController;

class HomeControllerTest extends TestCase
{
    /**
     * @runInSeparateProcess
     * @return void
     */
    public function testHome(): void
    {
        $home = new HomeController();
        $result = $home->home();
        $this->assertTrue($result);
    }
}
