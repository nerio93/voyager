<?php

namespace Lisandrop05\Voyager\Actions;

class ProcessAction extends AbstractAction
{
    public function getTitle()
    {
        return __('process');
    }

    public function getIcon()
    {
        return 'voyager-paper-plane';
    }

    public function getPolicy()
    {
        return 'process';
    }

    public function getAttributes()
    {
        return [
            'class'   => 'btn btn-sm btn-info pull-left info',
            'data-id' => $this->data->{$this->data->getKeyName()},
            'id'      => 'process-'.$this->data->{$this->data->getKeyName()},
        ];
    }

    public function getDefaultRoute()
    {
        return 'javascript:;';
    }
}
