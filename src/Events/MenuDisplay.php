<?php

namespace Lisandrop05\Voyager\Events;

use Illuminate\Queue\SerializesModels;
use Lisandrop05\Voyager\Models\Menu;

class MenuDisplay
{
    use SerializesModels;

    public $menu;

    public function __construct(Menu $menu)
    {
        $this->menu = $menu;

        // @deprecate
        //
        event('voyager.menu.display', $menu);
    }
}
