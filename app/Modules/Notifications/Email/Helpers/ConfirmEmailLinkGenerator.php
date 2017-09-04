<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 9/4/17
 * Time: 17:24
 */

namespace App\Modules\Notifications\Email\Helpers;


use App\User;

/**
 * Class ConfirmEmailLinkGenerator
 * @package App\Modules\Notifications\Email
 */
class ConfirmEmailLinkGenerator
{
    /**
     * @param User $user
     * @return string
     */
    public function getConfirmEmailLink(User $user) :string
    {
        //todo: implement some database logic
        return url('/');
    }
}