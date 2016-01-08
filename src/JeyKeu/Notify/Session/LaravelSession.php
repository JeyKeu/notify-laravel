<?php namespace JeyKeu\Notify\Session;

/**
 * Created by PhpStorm.
 * User: jeykeu
 * Date: 12/27/15
 * Time: 9:13 PM
 */
use JeyKeu\Notify\Notification;

/**
 * Class LaravelSession
 *
 * @package JeyKeu\Notify\Session
 */
class LaravelSession implements SessionInterface
{


    /**
     * The Native PHP session driver.
     *
     */
    protected $store;


    /**
     * Put a value in the Notify session.
     *
     * @param        $key
     * @param  mixed $value
     *
     * @return $this|void
     */
    public function set( $key, $value )
    {
        /**
         * @var $nf Notification
         */
        foreach ($value as $idx => $nf) {
            if ($nf->isPersisted()) {
                Session()->put($key, $value);
            } else {
                session()->flash($key, $value);
            }
        }


        return $this;
    }

    /**
     * Get the Notify session value.
     *
     * @param $key
     *
     * @return mixed
     */
    public function get( $key )
    {
        if (!session()->get($key)) {
            return false;
        }
        return session()->get($key);
    }

    /**
     * Remove the Notify session.
     *
     * @return mixed
     */
    public function remove( $key )
    {
        if ($key) {
            session($key)->forget();
        }
        return $this;
    }

    /**
     * @param $key
     *
     * @return mixed
     */
    public function clear( $key )
    {
//        session($key)->forget();
        return $this;
    }
}