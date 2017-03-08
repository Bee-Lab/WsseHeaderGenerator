<?php

namespace BeelabWsseHeaderGenerator;

/**
 * @see http://security.stackexchange.com/questions/92826/how-to-create-a-secure-nonce-for-wsse
 *
 * Class Noncer
 */
class Noncer
{
    /**
     * @return string
     */
    public function generate()
    {
        $nonce = bin2hex(openssl_random_pseudo_bytes(16));

        return $nonce;
    }
}
