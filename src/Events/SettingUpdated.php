<?php

namespace Lisandrop05\Voyager\Events;

use Illuminate\Queue\SerializesModels;
use Lisandrop05\Voyager\Models\Setting;

class SettingUpdated
{
    use SerializesModels;

    public $setting;

    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }
}
