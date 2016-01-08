<?php namespace JeyKeu\Notify\Uri;

/**
 * Created by PhpStorm.
 * User: jeykeu
 * Date: 12/27/15
 * Time: 9:26 PM
 */
use Request;

class LaravelUri implements UriInterface
{

    /**
     * Returns the full URL of the current page.
     */
    public function getCurrentUrl()
    {
        return Request::url();
    }

    /**
     * Returns the last segment of the URL i.e. the page name.
     */
    public function getCurrentPage()
    {
        return Request::path();
    }

    /**
     * Returns a segment of the URL as specified by the $index variable.
     *
     * @param int   $index
     * @param mixed $url
     *
     * @return mixed
     */
    public function getSegment( $index, $url = null )
    {
        return Request::segment($index, $url);
    }

    /**
     * Returns an array with all the segments of the current page or the page
     * specified in the $url parameter.
     *
     * @param  mix $url
     *
     * @return array array of URL segments
     */
    public function getSegments( $url = null )
    {
        return Request::get($url)->segments();
    }

    /**
     * Returns the last segment of the url
     *
     * @param string $url
     */
    public function getLastSegment( $url = null )
    {
        $segments = Request::get($url)->segments();
        return $segments[ count($segments) - 1 ];
    }
}