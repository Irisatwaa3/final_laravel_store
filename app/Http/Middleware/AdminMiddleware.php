<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
  public function handle($request, \Closure $next)
{
    if (auth('customer')->check() && auth('customer')->user()->role === 'admin') {
        return $next($request);
    }

    return response()->json(['message' => 'Unauthorized.'], 403);
}


}
