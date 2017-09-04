<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 9/3/17
 * Time: 23:27
 */

namespace App\Modules\Notifications\Email\NotificationProcessors;


use App\Events\UserRegisterEvent;
use App\Events\UserSendFeedbackEvent;
use App\Modules\Notifications\Email\FeedbackEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

/**
 * Class SendFeedbackEmailNotification
 * @package App\Modules\Notifications\Email
 */
class SendFeedbackEmailNotification implements ShouldQueue
{
    /**
     * @param UserSendFeedbackEvent $event
     * @return bool
     */
    public function handle(UserSendFeedbackEvent $event)
    {
        try {
            Mail::send(new FeedbackEmail($event->getUser(), $event->getFeedback()));
        } catch (\Throwable $e) {
            //Log::error("Error while processing event ({$event->getEventId()}): ". $e->getMessage());
            echo "Error while processing event ({$event->getEventId()}): ". $e->getMessage() . "\n";
        }

        return true;
    }
}