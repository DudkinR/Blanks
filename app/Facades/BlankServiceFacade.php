<?php
namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class BlankServiceFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'my-service';
    }
}
