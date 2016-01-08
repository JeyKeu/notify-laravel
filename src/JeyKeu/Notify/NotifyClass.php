<?php
namespace JeyKeu\Notify;

use JeyKeu\Notify\Session\SessionInterface;
use JeyKeu\Notify\Uri\UriInterface;

class NotifyClass implements \Countable
{

    protected $sessionKeyBase = 'jeykeu_notify';
    protected $notifications;
    protected $session;
    protected $uri;

    function __construct( SessionInterface $session, UriInterface $uri )
    {
        $this->session = $session;
        $this->uri     = $uri;
    }

    /**
     * @return string
     */
    public function getSessionKeyBase()
    {
        return $this->sessionKeyBase;
    }

    /**
     * @param string $sessionKeyBase
     */
    public function setSessionKeyBase( $sessionKeyBase )
    {
        $this->sessionKeyBase = $sessionKeyBase;
    }

    public function add( Notification $notification )
    {
        if (is_array($notification)) {
            array_map([$this, 'add'], $notification);
        }
        $this->notifications[] = $notification;
        $this->session->set($this->sessionKeyBase, $this->notifications);
    }


    /**
     * @return int
     */
    public function count()
    {
        return count($this->notifications);
    }

    /**
     * @param $handle
     *
     * @return $this
     */
    public function remove( $handle )
    {
        $this->notifications = $this->session->get($this->sessionKeyBase);;
        if ($this->notifications) {
            foreach ($this->notifications as $key => $nf) {
                if ($nf->getHandle() == $handle) {
                    unset( $this->notifications[ $key ] );
                }
            }
            if (sizeof($this->notifications) < 1) {
                $this->session->clear($this->sessionKeyBase);
            } else {
                $this->session->set($this->sessionKeyBase, $this->notifications);
            }
        }
        return $this;
    }

    /**
     * @param            $message
     * @param            $handle
     * @param bool|false $isPersisted
     * @param bool|true  $isDismissable
     * @param array      $excludePages
     *
     * @return $this
     */
    public function message(
        $message,
        $handle,
        $isPersisted = false,
        $isDismissable = true,
        $excludePages = []
    ) {
        $nf = new Notification($message,
            $handle,
            $type = 'info',
            $isPersisted = false,
            $isDismissable = true,
            $excludePages = []);
        $this->add($nf);
        return $this;
    }

    /**
     * @param            $message
     * @param            $handle
     * @param bool|false $isPersisted
     * @param bool|true  $isDismissable
     * @param array      $excludePages
     *
     * @return $this
     */
    public function info(
        $message,
        $handle,
        $isPersisted = false,
        $isDismissable = true,
        $excludePages = []
    ) {
        $nf = new Notification($message,
            $handle,
            $type = 'info',
            $isPersisted,
            $isDismissable,
            $excludePages);
        $this->add($nf);
        return $this;
    }

    /**
     * @param            $message
     * @param            $handle
     * @param bool|false $isPersisted
     * @param bool|true  $isDismissable
     * @param array      $excludePages
     *
     * @return $this
     */
    public function success(
        $message,
        $handle,
        $isPersisted = false,
        $isDismissable = true,
        $excludePages = []
    ) {
        $nf = new Notification($message,
            $handle,
            $type = 'success',
            $isPersisted,
            $isDismissable,
            $excludePages);
        $this->add($nf);
        return $this;
    }

    /**
     * @param            $message
     * @param            $handle
     * @param bool|false $isPersisted
     * @param bool|true  $isDismissable
     * @param array      $excludePages
     *
     * @return $this
     */
    public function error(
        $message,
        $handle,
        $isPersisted = false,
        $isDismissable = true,
        $excludePages = []
    ) {
        $nf = new Notification($message, $handle,
            $type = 'danger',
            $isPersisted,
            $isDismissable,
            $excludePages);
        $this->add($nf);
        return $this;
    }

}