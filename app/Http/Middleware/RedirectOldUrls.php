<?php

namespace App\Http\Middleware;

use App\Models\Redirect;
use Closure;
use Illuminate\Http\Request;

class RedirectOldUrls
{
    /**
     * Resolve 301/410 redirects for migrated (removed) URLs.
     */
    public function handle(Request $request, Closure $next)
    {
        $path = trim($request->path(), '/');

        $redirect = Redirect::where('source', $path)->first();

        if ($redirect) {
            if ($redirect->status === 410 || empty($redirect->destination)) {
                abort(410);
            }

            return redirect($redirect->destination, $redirect->status);
        }

        return $next($request);
    }
}
