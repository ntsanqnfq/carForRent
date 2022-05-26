<?php

namespace Sang\tests\Controller;

use PHPUnit\Framework\TestCase;
use Sang\CarForRent\Controller\ContactController;

class ContactControllerTest extends TestCase
{
    /**
     * @runInSeparateProcess
     * @return void
     */
    public function testContact(): void
    {
        $contact = new ContactController();
        $result = $contact->contact();
        $this->assertTrue($result);
    }
}
