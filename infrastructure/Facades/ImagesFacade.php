<?php

namespace infrastructure\Facades;

use Illuminate\Support\Facades\Facade;
use infrastructure\Facades\Images;

class ImagesFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return Images::class;
    }
}
