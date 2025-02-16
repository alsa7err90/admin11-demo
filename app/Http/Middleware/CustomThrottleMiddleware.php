<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Cache\RateLimiter;
use Symfony\Component\HttpFoundation\Response;

class CustomThrottleMiddleware
{
    protected $limiter;

    public function __construct(RateLimiter $limiter)
    {
        $this->limiter = $limiter;
    }

    public function handle($request, Closure $next)
    {
        $maxAttempts = config('core.rate_limit', 60); // استخدام القيمة من core.php
        $decayMinutes = config('core.decay_minutes', 1); // مدة انتهاء المحاولة

        $key = $request->ip(); // مفتاح التحديد يمكن تغييره

        if ($this->limiter->tooManyAttempts($key, $maxAttempts)) {
            return response()->json([
                'message' => 'Too Many Attempts. Please try again later.'
            ], Response::HTTP_TOO_MANY_REQUESTS);
        }

        $this->limiter->hit($key, $decayMinutes * 60);

        return $next($request);
    }
}
