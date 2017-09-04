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
 * Class UserRegisterEvent
 * @package App\Events
 */
class UserRegisterEvent extends Event
{
    /**
     * @var User
     */
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
        parent::__construct();
    }

    public function getUser() :User
    {
        return $this->user;
    }
}