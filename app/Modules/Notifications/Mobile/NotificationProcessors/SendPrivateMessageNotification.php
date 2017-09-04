<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 9/3/17
 * Time: 23:27
 */

namespace App\Modules\Notifications\Mobile\NotificationProcessors;


use App\Events\PrivateMessageEvent;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * Class SendPrivateMessageNotification
 * @package App\Modules\Notifications\Mobile
 */
class SendPrivateMessageNotification implements ShouldQueue
{
    /**
     * @param PrivateMessageEvent $event
     */
    public function handle(PrivateMessageEvent $event)
    {
        //todo: implement iOS/Android push notification
    }
}