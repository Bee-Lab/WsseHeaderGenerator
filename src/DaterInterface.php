<?php

namespace BeelabWsseHeaderGenerator;

/**
 * Interface Dater.
 */
interface DaterInterface
{
    /**
     * @return string
     */
    public function generate($createTime);
}
