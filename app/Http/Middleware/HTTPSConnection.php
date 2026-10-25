<?php

namespace App\Http\Middleware;
use Closure;
use App\Models\Generalsetting;

class HTTPSConnection {

    public function handle($request, Closure $next)
    {
        // A local HTTP canonical must not bounce forever between this middleware and the controller.
        if ($request->is('services/*', 'en/services/*') && parse_url(\App\Support\ServiceSeo::root(), PHP_URL_SCHEME) === 'http') {
            return $next($request);
        }
        
        $gs = Generalsetting::find(1);

            // if($gs->is_secure == 1) {
          
            // }

           if (!$request->secure()) {

                   return redirect()->secure($request->getRequestUri(), $request->is('services/*', 'en/services/*') ? 301 : 302);
            }
            return $next($request);

    }

}



