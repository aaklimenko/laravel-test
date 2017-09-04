<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class AuthDummyUser
{
    private static $testData = [
        'name' => 'Alex'
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $user = new User();
        $user->setAttribute('email', env('TEST_EMAIL_ADDRESS'));
        $user->setAttribute('name', self::$testData['name']);

        Auth::setUser($user);

        return $next($request);
    }
}
