<?php

namespace Tjventurini\VoyagerProjects\Actions;

use TCG\Voyager\Actions\AbstractAction;

class ProjectSessionSelectAction extends AbstractAction
{
    public function getTitle()
    {
        return 'Select';
    }

    public function getIcon()
    {
        return 'voyager-resize-full';
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
        ];
    }

    public function getDefaultRoute()
    {
        return '?project='.$this->data->slug;
    }

    public function shouldActionDisplayOnDataType()
    {
        return $this->dataType->slug == 'projects';
    }
}
