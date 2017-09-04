<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 9/3/17
 * Time: 23:27
 */

namespace App\Modules\Notifications\Email\NotificationProcessors;


use App\Events\UserRegisterEvent;
use App\Modules\Notifications\Email\Helpers\ConfirmEmailLinkGenerator;
use App\Modules\Notifications\Email\RegisterEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

/**
 * Class SendConfirmEmailNotification
 * @package App\Modules\Notifications\Email
 */
class SendConfirmEmailNotification implements ShouldQueue
{
    /**
     * @var ConfirmEmailLinkGenerator
     */
    private $confirmEmailLinkGenerator;

    /**
     * SendConfirmEmailNotification constructor.
     * @param ConfirmEmailLinkGenerator $confirmEmailLinkGenerator\
     */
    public function __construct(ConfirmEmailLinkGenerator $confirmEmailLinkGenerator)
    {
        $this->confirmEmailLinkGenerator = $confirmEmailLinkGenerator;
    }

    /**
     * @param UserRegisterEvent $event
     * @return bool
     */
    public function handle(UserRegisterEvent $event)
    {
        try {
            $confirmLink = $this->confirmEmailLinkGenerator->getConfirmEmailLink($event->getUser());
            Mail::send(new RegisterEmail($event->getUser(), $confirmLink));
        } catch (\Throwable $e) {
           // Log::error("Error while processing event ({$event->getEventId()}): ". $e->getMessage());
            echo "Error while processing event ({$event->getEventId()}): ". $e->getMessage();
        }

        return true;
    }
}