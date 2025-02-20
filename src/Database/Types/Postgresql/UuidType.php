<?php

namespace Lisandrop05\Voyager\Database\Types\Postgresql;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Lisandrop05\Voyager\Database\Types\Type;

class UuidType extends Type
{
    public const NAME = 'uuid';

    public function getSQLDeclaration(array $field, AbstractPlatform $platform)
    {
        return 'uuid';
    }
}
