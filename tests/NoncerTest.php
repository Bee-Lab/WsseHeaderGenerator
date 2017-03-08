<?php

namespace BeelabWsseHeaderGenerator\tests;

use BeelabWsseHeaderGenerator\Noncer;

class NoncerTest extends \PHPUnit_Framework_TestCase
{
    public function testGenerate()
    {
        $noncer = new Noncer();
        $nonce = $noncer->generate();
    }
}
