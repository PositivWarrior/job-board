<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Employer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(null === $request->user() || null === $request->user()->employer) {
            return redirect()->route('employer.create')
                ->with('error', 'You must be an employer to access this page');
        }

        return $next($request);
    }
}
