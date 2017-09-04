<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 9/3/17
 * Time: 23:27
 */

namespace App\Modules\Notifications\Browser\NotificationProcessors;


use App\Events\PrivateMessageEvent;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * Class SendPrivateMessageNotification
 * @package App\Modules\Notifications\Browser
 */
class SendPrivateMessageNotification implements ShouldQueue
{
    /**
     * @param PrivateMessageEvent $event
     */
    public function handle(PrivateMessageEvent $event)
    {
        //todo: implement client notification (centrifugo, browser push, etc)
    }
}