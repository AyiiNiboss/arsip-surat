<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class AuthenticateBagian extends Middleware
{
    /**
     * Get the guard or guards that should be used for authentication.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|string|null
     */
    protected function authenticate($request, array $guards)
    {
        if (in_array('bagian', $guards)) {
            return auth()->guard('bagian');
        }

        return $this->auth->guard($guards);
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  mixed  ...$guards
     * @return mixed
     */
    public function handle($request, Closure $next, ...$guards)
    {
        $this->authenticate($request, $guards);

        return $next($request);
    }
}