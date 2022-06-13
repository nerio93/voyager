<?php

namespace Lisandrop05\Voyager\Database\Types\Postgresql;

use Lisandrop05\Voyager\Database\Types\Common\VarCharType;

class CharacterVaryingType extends VarCharType
{
    public const NAME = 'character varying';
    public const DBTYPE = 'varchar';
}
