<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecurityHeaders
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        // Tambahkan header keamanan
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('Content-Security-Policy', "frame-ancestors 'self'");
        $response->headers->remove('X-Frame-Options'); // Hapus agar tidak bentrok

        return $response;
    }
}