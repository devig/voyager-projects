<?php

namespace Tjventurini\VoyagerProjects\Actions;

use TCG\Voyager\Actions\AbstractAction;

class ProjectOpenUrlAction extends AbstractAction
{
    public function getTitle()
    {
        return 'Open Link';
    }

    public function getIcon()
    {
        return 'voyager-forward';
    }

    public function getPolicy()
    {
        return 'read';
    }

    public function getAttributes()
    {
        return [
            'class' => 'btn btn-sm btn-primary pull-right',
            'style' => 'margin-right: 5px',
            'target' => '_blank',
        ];
    }

    public function getDefaultRoute()
    {
        return $this->data->url;
    }

    public function shouldActionDisplayOnDataType()
    {
        return ($this->dataType->slug == 'projects' && $this->data->url);
    }
}
