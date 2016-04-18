<?php

namespace app\Http\Middleware;

use Closure;

class VerifyAccessPermission
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next, $roleid)
    {
        if ($request->user()->user_type_id > $roleid) {
            return abort(401);
        }

        return $next($request);
    }
}
