<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 9/4/17
 * Time: 00:07
 */

namespace App\Modules\Notifications\Email;


use App\User;
use Wpb\StringBladeCompiler\StringView;

/**
 * Class RegisterEmail
 * @package App\Modules\Notifications\Email
 */
class RegisterEmail extends Email
{

    /**
     * @var string
     */
    public $receiverName;

    /**
     * @var string
     */
    public $receiverEmail;

    /**
     * @var string
     */
    public $confirmUrl;

    /**
     * RegisterEmail constructor.
     * @param User $receiver
     * @param string $confirmUrl
     */
    public function __construct(User $receiver, string $confirmUrl)
    {
        $this->receiverName = $receiver->getName();
        $this->receiverEmail = $receiver->getEmail();
        $this->confirmUrl = $confirmUrl;
    }

    /**
     * @return $this
     */
    public function build()
    {
        $this->to($this->receiverEmail)->from(config('mail.from.address'));
        return $this->markdown('notifications.email.register');
    }
}