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
        $adminLoginUrl = '/login';

        if (!auth()->guest()) {
            $user = auth()->user();
            if ($user->hasRole(['admin', 'editor'])) {
                return $next($request);
            } else {
                auth()->logout();
                // error message
                return redirect($adminLoginUrl)
                    ->withErrors([
                        "email" => trans('auth.failed'),
                    ]);
            }
        }

        return redirect()->guest($adminLoginUrl);
    }
}
