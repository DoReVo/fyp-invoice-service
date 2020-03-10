<?php

namespace App\Http\Middleware;

use App\Helpers\JWTHelper;
use Closure;

// use Illuminate\Http\Request;

class JWTAuth
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

        // New JWTHelper instance
        $jwtHandler = new JWTHelper;

        // Get JWT Token
        $token = $request->bearerToken();

        // If token does not exist
        if (!$token) {
            // Respond with unauthorized request
            return response(array('error' => 'You are not authenticated'), 403);
            // return $request->header();
        }

        $decodedToken = $jwtHandler->decode($token);

        return $next($request);

        // try {

        //     // Decode JWT token
        //     $decodedToken = $jwtHandler->decode($token);

        // } catch (\Exception $e) {
        //     return response(
        //         json_encode(
        //             array(
        //                 'message' => $e->getMessage(),
        //             )
        //         ),
        //         403
        //     );
        // }

        // return $invoice;
    }
}
