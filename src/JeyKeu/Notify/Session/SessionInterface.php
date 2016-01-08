<?php namespace JeyKeu\Notify\Session;

/**
 * SessionInterface
 */
interface SessionInterface
{

    /**
     * Put a value in the Notify session.
     *
     * @param  mixed $value
     *
     * @return void
     */
    public function set( $key, $value );

    /**
     * Get the Notify session value.
     *
     * @return mixed
     */
    public function get( $key );

    /**
     * Remove the Notify session.
     *
     * @return void
     */
    public function remove( $key );

    /**
     * @param $key
     *
     * @return mixed
     */
    public function clear( $key );
}
