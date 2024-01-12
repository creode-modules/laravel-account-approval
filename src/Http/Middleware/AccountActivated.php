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
    public function handle(Request $request, Closure $next): ?Response
    {
        // If user is not logged in, we can continue.
        if (!auth()->check()) {
            return $next($request);
        }

        // If they are activated, we can continue.
        if (auth()->user()->activated) {
            return $next($request);
        }

        // Run an action when the account is not activated.
        $this->accountNotActivated(request(), $next);

        // Check if we need to redirect the user.
        $unverifiedRedirect = $this->unverifiedAccountRedirect(request(), $next);
        if (is_null($unverifiedRedirect)) {
            return $next($request);
        }

        // Redirect the user.
        return $unverifiedRedirect;
    }

    /**
     * Handle a failed activation.
     *
     * @param \Illuminate\Http\Request  $request
     * @param \Closure  $next
     *
     * @return mixed
     */
    protected function accountNotActivated(Request $request, Closure $next)
    {
        // If they are not activated, log them out and redirect them to the login page with a message.
        auth()->logout();
    }

    /**
     * Redirect which will happen if the user is not activated.
     *
     * Return null to continue with the request.
     *
     * @param Request $request
     * @param Closure $next
     *
     * @return Response|null
     */
    protected function unverifiedAccountRedirect(Request $request, Closure $next): ?Response
    {
        return redirect()
            ->route('login')
            ->with('error', 'Your account has not been verified.');
    }
}
