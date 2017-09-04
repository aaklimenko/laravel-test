<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 9/3/17
 * Time: 21:36
 */

namespace App\Http\Controllers;

use App\Events\UserRegisterEvent;
use App\Events\UserSendFeedbackEvent;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;


/**
 * Class TestController
 * @package App\Http\Controllers
 */
class TestController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function testFeedbackEvent()
    {
        $user = Auth::user();

        event(new UserSendFeedbackEvent($user, "feedback"));

        return view('feedback', ['email' => $user->getEmail(), 'name' => $user->getName()]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function testRegistrationEvent()
    {
        $user = Auth::user();

        event(new UserRegisterEvent($user));

        return view('registration', ['email' => $user->getEmail(), 'name' => $user->getName()]);
    }
}