<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Cache\RateLimiter;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RequestLimit
{
    public function handle($request, Closure $next, $maxAttempts = 10, $decaySeconds = 60)
    {
        $key = $request->ip();
        $rateLimiter = app(RateLimiter::class);

        if ($rateLimiter->tooManyAttempts($key, $maxAttempts)) {
            return new Response('Too many requests.', 429);
        }

        $rateLimiter->hit($key, $decaySeconds);

        return $next($request);
    }
}
