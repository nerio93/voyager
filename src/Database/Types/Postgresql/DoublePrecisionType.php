<?php

namespace Lisandrop05\Voyager\Database\Types\Postgresql;

use Lisandrop05\Voyager\Database\Types\Common\DoubleType;

class DoublePrecisionType extends DoubleType
{
    public const NAME = 'double precision';
    public const DBTYPE = 'float8';
}
