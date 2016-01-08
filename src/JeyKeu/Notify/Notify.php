<?php
/**
 * Created by PhpStorm.
 * User: jeykeu
 * Date: 12/28/15
 * Time: 10:06 AM
 */
namespace JeyKeu\Notify;
use Illuminate\Support\Facades\Facade;

/**
 * Class Notify
 *
 * @package Notify
 */
class Notify extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'notify';
    }
}