<?php

namespace Tjventurini\VoyagerProjects\Traits;

use Tjventurini\VoyagerProjects\Scopes\BelongsToProjectScope;

trait ProjectSessionScope
{
    public static function bootProjectSessionScope()
    {
        static::addGlobalScope(new BelongsToProjectScope);
    }
}
