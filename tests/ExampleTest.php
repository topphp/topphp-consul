<?php

declare(strict_types=1);

namespace Topphp\Test;

use Topphp\TopphpConsul\consul\Agent;
use Topphp\TopphpConsul\ConsulClient;
use Topphp\TopphpTesting\HttpTestCase;

class ExampleTest extends HttpTestCase
{
    /**
     * Test that true does in fact equal true
     */
    public function testTrueIsTrue()
    {
        $c   = new ConsulClient();
        $a   = new Agent($c);
        $res = $a->members();
        var_dump($res->getBody());
        $this->assertEquals($res->getStatusCode(), 200);
    }

    public function testOption()
    {
        $a = '123123';
        var_dump($a);
    }
}
