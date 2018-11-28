<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $adminLoginUrl = '/';

        if (!auth()->guest()) {
            $user = auth()->user();
            if ($user->roles[0]->name=='admin') {
                return $next($request);
            } else {
                return redirect($adminLoginUrl);
            }
        }

        return redirect()->guest($adminLoginUrl);
    }
}
