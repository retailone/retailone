<?php

namespace RetailOne\Http\Middleware;

use Closure;
use Illuminate\Auth\Guard;

class RoleAdminCheck
{
    public function __construct(Guard $auth) {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$this->auth->user()->hasRole('admin')) {
            abort(403);
        }

        return $next($request);
    }
}
