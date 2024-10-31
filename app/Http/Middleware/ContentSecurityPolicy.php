<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ContentSecurityPolicy
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        $response->headers->set('Content-Security-Policy', "default-src 'self'; script-src 'self' https://api.mapbox.com https://cdn.segment.com; style-src 'self' https://api.mapbox.com; img-src 'self' data: https://api.mapbox.com; font-src 'self'; connect-src 'self' https://*.tiles.mapbox.com https://api.mapbox.com https://events.mapbox.com");

        return $response;
    }
}
