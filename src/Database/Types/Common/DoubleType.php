<?php

namespace Lisandrop05\Voyager\Database\Types\Common;

use Doctrine\DBAL\Types\FloatType as DoctrineFloatType;

class DoubleType extends DoctrineFloatType
{
    public const NAME = 'double';

    public function getName()
    {
        return static::NAME;
    }
}
