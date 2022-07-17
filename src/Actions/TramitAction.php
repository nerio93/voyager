<?php

namespace Lisandrop05\Voyager\Actions;

class TramitAction extends AbstractAction
{
    public function getTitle()
    {
        return __('tramit');
    }

    public function getIcon()
    {
        return 'voyager-paper-plane';
    }

    public function getPolicy()
    {
        return 'tramit';
    }

    public function getAttributes()
    {
        return [
            'class'   => 'btn btn-sm btn-info pull-left info',
            'data-id' => $this->data->{$this->data->getKeyName()},
            'id'      => 'tramit-'.$this->data->{$this->data->getKeyName()},
        ];
    }

    public function getDefaultRoute()
    {
        return 'javascript:;';
    }
}
