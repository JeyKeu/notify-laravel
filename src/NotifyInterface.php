<?php namespace JeyKeu\Notify;

/**
 * Created by PhpStorm.
 * User: jeykeu
 * Date: 12/27/15
 * Time: 8:59 PM
 */


interface NotifyInterface
{
//    function handleExists( $handle );

//    function isExcluded( $notification, $page );

    /**
     *
     * @param string $message
     * @param string $type       message | alert |
     * @param bool   $canDismiss true
     */
//    function show( $message, $type = 'message', $canDismiss = true );

    /**
     * Queues notifications in the Notify's Notification system
     *
     * @param string $handle         An easy-to-remember name for
     *                               the notification.
     *                               Something like a slug in wordpress
     * @param string $message        view or text to be displayed on the
     *                               notification
     * @param string $type           alert|message
     * @param bool   $isPersisted    if true, the notification will not appear
     *                               if the user navigates away or reloads the page.
     * @param bool   $isDismissable  If true, user can close the notification
     * @param array  $excludePages
     */
    public function add(
        $handle,
        $message = null,
        $type = 'alert',
        $isPersisted = true,
        $isDismissable = true,
        $excludePages = []
    );

    /**
     * Reomve a single notification as specied by the $handle param.
     *
     * @param string $handle
     */
    public function remove( $handle );

    /**
     * Remove all the notifications
     */
    public function removeAll();

    public function message();

    public function info();

    public function warning();

    public function error();
}