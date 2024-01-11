<?php

namespace Creode\LaravelAccountApproval\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Creode\LaravelAccountApproval\LaravelAccountApproval
 */
class LaravelAccountApproval extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Creode\LaravelAccountApproval\LaravelAccountApproval::class;
    }
}
