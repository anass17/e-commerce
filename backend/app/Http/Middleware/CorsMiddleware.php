<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CorsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Set CORS headers
        $response->headers->set('Access-Control-Allow-Origin', '*'); // Allow all origins
        $response->headers->set('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS'); // Allowed methods
        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, X-Requested-With, Authorization'); // Allowed headers
        $response->headers->set('Access-Control-Allow-Credentials', 'true'); // Allow credentials (cookies, HTTP auth, etc.)
        
        // Handle pre-flight requests (OPTIONS method)
        if ($request->getMethod() == 'OPTIONS') {
            $response->setStatusCode(200);
            $response->headers->set('Access-Control-Max-Age', '3600'); // Cache preflight response for 1 hour
        }

        return $response;
    }
}
