<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class UserAgentSuccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $supportedAgents = [
            'Some user agent'
        ];

        if (!(in_array($request->header('User-Agent'), $supportedAgents))) {
            throw new HttpException(403, 'Your web client not supported');
        }
        return $next($request);
    }
}
