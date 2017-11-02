<?php

namespace AppWatcher\Core\Http\Middleware;

use AppWatcher\App\Models\App;
use Closure;

class ClientAuth
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
        $appKey = $request->header('app-key');
        $appSecret = $request->header('app-secret');
        if (!$appKey || !$appSecret) {
            return response()->json(['message' => 'Missing app key or secret'], 401);
        }

        $app = App::whereAppKey($appKey)->whereAppSecret($appSecret)->first();
        if (!$app) {
            return response()->json(['message' => 'Invalid App Key or Secret'], 403);
        }

        return $next($request);
    }
}
