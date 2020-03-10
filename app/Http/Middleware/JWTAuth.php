<?php

namespace App\Http\Middleware;

use Closure;
use App\Invoice;

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
        $route = $request->route();
        $invoice_id = $route[2]['id'];
        try {
            $invoice = Invoice::findOrFail($invoice_id);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 400);
        }
        $request
        return $next($request);

        // return $invoice;
    }
}
