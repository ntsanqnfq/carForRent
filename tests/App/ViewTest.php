<?php

namespace Sang\tests\App;

use PHPUnit\Framework\Test;
use PHPUnit\Framework\TestCase;
use Sang\CarForRent\App\View;

class ViewTest extends TestCase
{
    /**
     * @runInSeparateProcess
     */
    public function testRedirect()
    {
        View::redirect('/');
        $this->assertContains('Location: /', xdebug_get_headers());
    }
}
