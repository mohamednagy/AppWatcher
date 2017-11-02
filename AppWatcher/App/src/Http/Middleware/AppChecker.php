<?php

namespace AppWatcher\Http\Middleware;

use Closure;

class AppChecker
{
    /**
     * check if the route has a valid app name parameter, if not return him to the apps page.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->route('app_key') && !$request->is('apps')) {
            return redirect('apps');
        }

        return $next($request);
    }
}
