<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            Carbon::setLocale('ru');

            $userId = Auth::user()->id;
            $expiresAfter = Carbon::now()->addSeconds(5);

            Cache::put('user-online' . $userId, true, $expiresAfter);
            Cache::put('user-last-seen' . $userId, now());

            return $next($request);
        }

        return redirect()->route('login.index');
    }
}
