<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RequestLogger
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (in_array(\App::environment(), config('const.request_logger.environment'), true)) {
            $this->writeLog($request);
        }

        return $next($request);
    }

    /**
     * @param Request $request
     * @return void
     */
    private function writeLog(Request $request): void
    {
        \Log::channel('request')->info(
            $request->method(),
            [
                'ip' => $request->ip(),
                'user-agent' => $request->userAgent(),
                'url' => $request->fullUrl(),
                'request' => $request->search_keyword
            ]
        );
    }
}
