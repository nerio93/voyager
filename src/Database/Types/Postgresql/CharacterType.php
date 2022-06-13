<?php

namespace Lisandrop05\Voyager\Database\Types\Postgresql;

use Lisandrop05\Voyager\Database\Types\Common\CharType;

class CharacterType extends CharType
{
    public const NAME = 'character';
    public const DBTYPE = 'bpchar';
}
