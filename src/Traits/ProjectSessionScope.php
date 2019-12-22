<?php

namespace Tjventurini\VoyagerProjects\Traits;

use Tjventurini\VoyagerProjects\Scopes\ProjectSession;

trait ProjectSessionScope
{
    public static function bootProjectSessionScope()
    {
        static::addGlobalScope(new ProjectSession);
    }
}
