<?php namespace JeyKeu\Notify\Test;

use Illuminate\Support\Facades\Session;

class NotifyTest extends \PHPUnit_Framework_TestCase{

    public function setUp()
    {
        parent::setUp();
        Session::start();
    }

    public function it_should_display_default_notification()
    {
        Notify::message('Test Message');
    }
}