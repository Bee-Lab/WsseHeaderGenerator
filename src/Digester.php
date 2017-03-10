<?php

namespace BeelabWsseHeaderGenerator;

/**
 * Class Digester.
 */
class Digester implements DigesterInterface
{
    /**
     * @return string
     */
    public function generate($nonce, $created, $password)
    {
        return sha1($nonce.$created.$password, true);
    }
}
