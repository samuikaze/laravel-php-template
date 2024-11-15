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
        $log = strtoupper($request->method());

        if (! is_null($request->getSchemeAndHttpHost())) {
            $log .= ' '.$request->getSchemeAndHttpHost();
        }

        if (! is_null($request->path())) {
            $log .= '/'.$request->path();
        }

        if (array_key_exists('content-type', $headers) && count($headers['content-type']) > 1) {
            $log .= ' '.$headers['content-type'][0];
        }

        if (array_key_exists('content-length', $headers) && count($headers['content-length']) > 1) {
            $log .= ' '.$headers['content-length'][0];
        }

        $log = '[Request] '.$log;

        return $log;
    }
}
