<?php

namespace JeyKeu\Notify;


class Notification
{
    protected $message;
    protected $handle;
    protected $type;
    protected $isPersisted;
    protected $isDismissable;
    protected $excludePages;

    public function __construct(
        $message,
        $handle,
        $type = 'info',
        $isPersisted = false,
        $isDismissable = true,
        $excludePages = []
    ) {
        $this->handle        = $handle;
        $this->message       = $message;
        $this->type          = $type;
        $this->isDismissable = $isDismissable;
        $this->isPersisted   = $isPersisted;
        $this->excludePages  = $excludePages;
    }

    public function message( $message )
    {
        $this->message = $message;
        $this->type    = 'info';
        return $this;
    }

    public function info( $message )
    {
        $this->message = $message;
        $this->type    = 'info';
        return $this;
    }

    public function success( $message )
    {
        $this->message = $message;
        $this->type    = 'success';
        return $this;
    }

    public function error( $message )
    {
        $this->message = $message;
        $this->type    = 'danger';
        return $this;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setType( $type )
    {
        $this->type = $type;
        return $this;
    }

    public function isDismissable()
    {
        return $this->isDismissable;
    }

    public function setDismissable( $isDismissable )
    {
        $this->isDismissable = $isDismissable;
        return $this;
    }

    public function setPersisted( $isPersisted )
    {
        $this->isPersisted = $isPersisted;
        return $this;
    }

    public function isPersisted()
    {
        return $this->isPersisted;
    }

    public function getExcludePages()
    {
        return $this->excludePages;
    }

    public function getType()
    {
        return $this->type;
    }

    public function handle( $handle )
    {
        $this->handle = $handle;
        return $this;
    }

    public function getHandle()
    {
        return $this->handle;
    }
}
