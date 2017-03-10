<?php

namespace BeelabWsseHeaderGenerator;

/**
 * Class Dater.
 */
class Dater implements DaterInterface
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
