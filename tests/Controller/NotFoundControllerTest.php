<?php

namespace Sang\tests\Controller;

use PHPUnit\Framework\TestCase;
use Sang\CarForRent\Controller\NotFoundController;

class NotFoundControllerTest extends TestCase
{
    /**
     * @return void
     */
    public function testNotFound(): void
    {
        $notFound = new NotFoundController();
        $result = $notFound->notFound();
        $this->assertTrue($result);
    }
}
