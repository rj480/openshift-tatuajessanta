<?php

namespace Santasangre\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
class IsAdmin
{
    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {
        if ($this->auth->user()->tipo != "admin") {
            $this->auth->logout();
            if ($request->ajax())
            {
                return response('Unauthorized.', 401);
            }
            else
            {
                return redirect()->to('/');
            }
        }
        return $next($request);
    }
}
