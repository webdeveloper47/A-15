<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class LogRequests
{
    
    public function handle(Request $request, Closure $next): Response
    {
        Log::info('Request: '. $request->getMethod() .' '. $request->fullUrl());

        return $next($request);
    }
}
