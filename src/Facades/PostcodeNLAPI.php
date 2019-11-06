<?php

namespace DenizTezcan\LaravelPostcodeNLAPI\Facades;

use Illuminate\Support\Facades\Facade;

class PostcodeNLAPI extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'postcodenl';
    }
}
