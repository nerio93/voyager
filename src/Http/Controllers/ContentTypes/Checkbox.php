<?php

namespace Lisandrop05\Voyager\Http\Controllers\ContentTypes;

class Checkbox extends BaseType
{
    /**
     * @return int
     */
    public function handle()
    {
        return (int) ($this->request->input($this->row->field) == 'on');
    }
}
