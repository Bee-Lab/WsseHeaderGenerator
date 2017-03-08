<?php

namespace BeelabWsseHeaderGenerator;

/**
 * Class Dater.
 */
class Dater
{
    /**
     * @return string
     */
    public function generate($createTime)
    {
        $created = new \DateTime($createTime, new \DateTimeZone('UTC'));

        return  $created->format(\DateTime::ISO8601);
    }
}
