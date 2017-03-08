<?php

namespace BeelabWsseHeaderGenerator\tests;

use BeelabWsseHeaderGenerator\Dater;

class DaterTest extends \PHPUnit_Framework_TestCase
{
    public function testGenerate()
    {
        $dater = new Dater();
        $dater->generate('now');
    }
}
