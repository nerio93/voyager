<?php

namespace Lisandrop05\Voyager\Events;

use Illuminate\Queue\SerializesModels;

class MediaFileAdded
{
    use SerializesModels;

    public $path;

    public function __construct($path)
    {
        $this->path = $path;
    }
}
