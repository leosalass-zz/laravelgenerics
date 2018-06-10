<?php

namespace Immersioninteractive\Laravelgenerics;

use Illuminate\Support\Facades\Facade;

class IIResponseFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'IIResponse';
    }
}
