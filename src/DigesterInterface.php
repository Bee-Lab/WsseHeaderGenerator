<?php

namespace BeelabWsseHeaderGenerator;

/**
 * Class DigesterInterface.
 */
interface DigesterInterface
{
    /**
     * @return string
     */
    public function generate($nonce, $created, $password);
}
