<?php

namespace BeelabWsseHeaderGenerator;

/**
 * @see http://security.stackexchange.com/questions/92826/how-to-create-a-secure-nonce-for-wsse
 *
 * Interface Noncer
 */
interface NoncerInterface
{
    /**
     * @return string
     */
    public function generate();
}
