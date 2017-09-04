<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 9/4/17
 * Time: 17:16
 */

namespace App\Modules\Notifications\Email;

use App\User;

/**
 * Class FeedbackEmail
 * @package App\Modules\Notifications\Email
 */
class FeedbackEmail extends Email
{
    /**
     * @var string
     */
    public $senderEmail;

    /**
     * @var string
     */
    public $senderName;

    /**
     * @var string
     */
    public $feedback;

    /**
     * FeedbackEmail constructor.
     * @param User $sender
     * @param string $feedback
     */
    public function __construct(User $sender, string $feedback)
    {
        $this->senderName = $sender->getName();
        $this->senderEmail = $sender->getEmail();
        $this->feedback = $feedback;
    }

    /**
     * @return $this
     */
    public function build()
    {
        $this->from($this->senderEmail)->to(config('mail.salesMail.address'));
        return $this->markdown('notifications.email.feedback');
    }
}