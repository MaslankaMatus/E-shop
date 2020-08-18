<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
//    protected function redirectTo($request)
//    {
//        if (! $request->expectsJson()) {
//            return route('login');
//        }
//    }

    public function handle($request, Closure $next, $role = null) {
        if ($this->auth->guest()){
            if ($request->ajax()){
                return response('Unauthorized.', 401);
            }else{
                return redirect()->guest('/login');
            }
        }

        if($role) {
            if( !$this->auth->user()->hasRole($role)){
                abort(403, 'you cant');
            }
        }

        return $next($request);
    }
}
