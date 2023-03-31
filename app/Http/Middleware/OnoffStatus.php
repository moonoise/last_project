<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\app_config;
class OnoffStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $appConfig = app_config::where('configname','=','onoff')->first();
        if ($appConfig->configvalue == "on") {
            // dd($request);
            return $next($request);
        } else {
            return redirect()->route('off.show');
        }
        // return response()->json('Your account is inactive');
        // return $next($request);
    }
}
