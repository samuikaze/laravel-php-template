<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class RequestLogger
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        Log::info($this->generateLogString($request));

        return $next($request);
    }

    /**
     * Generate log string.
     *
     * @param \Illuminate\Http\Request $request
     * @return string
     */
    protected function generateLogString($request): string
    {
        $headers = $request->headers->all();
        $log = strtoupper($request->method()).
            ' '.$request->getSchemeAndHttpHost().
            '/'.$request->path().
            ' '.$headers['content-type'][0].
            ' '.$headers['content-length'][0];

        $log = '[Request] '.$log;

        return $log;
    }
}
