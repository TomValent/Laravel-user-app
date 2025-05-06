<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var list<string>
     */
    protected $except = [
        '/auth/handle',
        'api/*',
    ];

    public function handle($request, \Closure $next)
    {
        // Skipping CSRF entirely
        return $next($request);
    }
}
