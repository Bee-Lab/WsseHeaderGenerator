<?php

namespace BeelabWsseHeaderGenerator\tests;

use BeelabWsseHeaderGenerator\WsseHeaderGenerator;

class WsseHeaderGeneratorTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        \Mockery::close();
    }

    public function testGenerate()
    {
        $user = \Mockery::mock("Symfony\Component\Security\Core\Encoder\EncoderAwareInterface");
        $noncer = \Mockery::mock("BeelabWsseHeaderGenerator\Noncer");
        $noncer->shouldReceive('generate')->andReturn('1234');

        $dater = \Mockery::mock("BeelabWsseHeaderGenerator\Dater");
        $dater->shouldReceive('generate')->andReturn('1970/01/01');

        $digester = \Mockery::mock("BeelabWsseHeaderGenerator\Digester");
        $digester->shouldReceive('generate')->andReturn('1234');

        $generator = new WsseHeaderGenerator($noncer, $dater, $digester);
        $header = $generator->generate('username', 'password');

        $this->assertContains('X-WSSE: UsernameToken Username="username"', $header);
    }

    public function testGenerateForTest()
    {
        $user = \Mockery::mock("Symfony\Component\Security\Core\Encoder\EncoderAwareInterface");

        $noncer = \Mockery::mock("BeelabWsseHeaderGenerator\Noncer");
        $noncer->shouldReceive('generate')->andReturn('1234');

        $dater = \Mockery::mock("BeelabWsseHeaderGenerator\Dater");
        $dater->shouldReceive('generate')->andReturn('1970/01/01');

        $digester = \Mockery::mock("BeelabWsseHeaderGenerator\Digester");
        $digester->shouldReceive('generate')->andReturn('1234');

        $generator = new WsseHeaderGenerator($noncer, $dater, $digester);
        $header = $generator->generateForTest();
        $this->assertContains('UsernameToken Username="admin1@example.org"', $header);
    }
}
