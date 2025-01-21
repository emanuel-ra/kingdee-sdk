<?php

namespace KingDee\Client\tests;

use PHPUnit\Framework\TestCase;

use KingDee\Client\HelloWorld;

class HelloWorldTest extends TestCase
{
    /**
     * @covers \KingDee\Client\HelloWorld::sayHello
     */
    public function testHelloWorld()
    {
        $helloWorld = new HelloWorld();
        $this->assertEquals('Hello, World!', $helloWorld->sayHello());
    }
}
