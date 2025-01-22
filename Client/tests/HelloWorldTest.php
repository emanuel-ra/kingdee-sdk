<?php

namespace KingDee\Client\tests;

use PHPUnit\Framework\TestCase;

use KingDee\Client\HelloWorld;

class HelloWorldTest extends TestCase
{
    /**
     * @covers \KingDee\Client\HelloWorld::testHelloWorld
     */
    public function testHelloWorld()
    {
        $helloWorld = new HelloWorld();
        $this->assertEquals('{"status":1,"message":"Hello World"}', $helloWorld->callHelloWorld());
    }
}
