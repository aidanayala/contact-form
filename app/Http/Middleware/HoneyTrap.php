<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

/**
 *
 * Applying this middleware will look for a "honey" parameter in any requests.
 * If the trap is triggered (i.e. if the honey parameter contains any data) it will invalidate the request and but return a false "success" response. The request will also be logged for investigation.
 * Otherwise it will process the request as normal.
 *
 * Class HoneyTrap
 * @package App\Http\Middleware
 */
class HoneyTrap
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
        // check "honey" parameter is empty
        if ($request->get('honey') == '') {

            // process next request
            return $next($request);
        }

        // log request
        Log::info(sprintf('HoneyTrap - ip: %s - name: %s - email: %s - text: %s', $request->ip(), $request->get('name'), $request->get('email'), $request->get('text')));

        // otherwise fail
        return response(['success' => true], 200);
    }
}
