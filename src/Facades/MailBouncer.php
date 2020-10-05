<?php

namespace Kwaadpepper\MailBouncer\Facades;

use Illuminate\Support\Facades\Facade;

class MailBouncer extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'mailbouncer';
    }
}
