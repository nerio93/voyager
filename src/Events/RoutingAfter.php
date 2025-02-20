<?php

namespace Lisandrop05\Voyager\Events;

use Illuminate\Queue\SerializesModels;

class RoutingAfter
{
    use SerializesModels;

    public $router;

    public function __construct()
    {
        $this->router = app('router');

        // @deprecate
        //
        event('voyager.routing.after', $this->router);
    }
}
