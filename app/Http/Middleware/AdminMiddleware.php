<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {

        if (auth()->check()) {
            if (auth()->user()->type_id !== '1') {
                return response()->json(['message' => 'Forbidden'], 403);
            }            
        } else {
                return response()->json(['message' => 'Forbidden'], 403);
        }
        
        return $next($request);
   
    }
}
