<?php

namespace BeelabWsseHeaderGenerator\tests;

use BeelabWsseHeaderGenerator\Digester;

class DigesterTest extends \PHPUnit_Framework_TestCase
{
    public function testGenerate()
    {
        $digester = new Digester();
        $digester->generate('username', '1970-01-01', 'password');
    }
}
