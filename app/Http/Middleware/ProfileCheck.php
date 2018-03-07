<?php

namespace App\Http\Middleware;

use Closure;

class ProfileCheck
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
        if (auth()->check() && auth()->user()->profile->slug === $request->segment(1)) {
            return redirect()->route('account.user.show');
        }

        return $next($request);
    }
}
