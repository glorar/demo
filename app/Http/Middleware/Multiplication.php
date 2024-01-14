<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Multiplication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $valueOne = $request->input('value_one', 0);
        $valueTwo = $request->input('value_two', 0);

        $request->merge([
            'sum' => $valueOne + $valueTwo
        ]);

        return $next($request);
    }
}
