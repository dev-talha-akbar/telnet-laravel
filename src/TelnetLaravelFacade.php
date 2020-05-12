<?php

namespace DevTalhaAkbar\TelnetLaravel;

use Illuminate\Support\Facades\Facade;

/**
 * @see \DevTalhaAkbar\TelnetLaravel\Skeleton\SkeletonClass
 */
class TelnetLaravelFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'telnet-laravel';
    }
}
