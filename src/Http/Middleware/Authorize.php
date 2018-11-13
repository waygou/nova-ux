<?php

namespace Waygou\NovaUx\Http\Middleware;

use Waygou\NovaUx\NovaUx;

class Authorize
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Illuminate\Http\Response
     */
    public function handle($request, $next)
    {
        return resolve(NovaUx::class)->authorize($request) ? $next($request) : abort(403);
    }
}
