<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redis;

class SessionAuth
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

        // cookie from request containing session id
        $sessionId = $request->cookie('session_id');

        try {
            // try to retrieve user session
            $session = Redis::exists($sessionId);
            // if session does not exist, return 403 error
            if (!$session) {
                throw new \Exception("You are not authenticated");
            }

            // if session exist, forward request to controller
            return $next($request);
        } catch (\Throwable $th) {
            return response()->json(array('error' => $th->getMessage()), 403);
        }

    }
}
