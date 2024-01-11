<?php

namespace Creode\LaravelAccountApproval\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AccountActivated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // If user is not logged in, we can continue.
        if (!auth()->check()) {
            return $next($request);
        }

        // If they are activated, we can continue.
        if (auth()->user()->activated) {
            return $next($request);
        }

        return $this->accountNotActivated(request(), $next);
    }

    /**
     * Handle a failed activation.
     *
     * @param \Illuminate\Http\Request  $request
     * @param \Closure  $next
     *
     * @return mixed
     */
    public function accountNotActivated(Request $request, Closure $next)
    {
        // If they are not activated, log them out and redirect them to the login page with a message.
        auth()->logout();
        return redirect()
            ->route(config('redirect_route_name', 'login'))
            ->with('error', 'Your account has not been verified.');
    }
}
