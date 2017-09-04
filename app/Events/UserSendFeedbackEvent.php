<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 9/3/17
 * Time: 23:08
 */

namespace App\Events;


use App\User;

/**
 * Class UserSendFeedbackEvent
 * @package App\Events
 */
class UserSendFeedbackEvent extends Event
{
    /**
     * @var User
     */
    private $user;

    private $feedback;

    public function __construct(User $user, string $feedback)
    {
        $this->user = $user;
        $this->feedback = $feedback;
        parent::__construct();
    }

    public function getUser() :User
    {
        return $this->user;
    }

    public function getFeedback()
    {
        return $this->feedback;
    }
}