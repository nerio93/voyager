<?php

namespace Lisandrop05\Voyager\Database\Types\Postgresql;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Lisandrop05\Voyager\Database\Types\Type;

class CidrType extends Type
{
    public const NAME = 'cidr';

    public function getSQLDeclaration(array $field, AbstractPlatform $platform)
    {
        return 'cidr';
    }
}
