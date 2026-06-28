<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use App\Models\Language;
use Session;

class RedirectToLocale
{
    public function handle($request, Closure $next)
    { 
        $uri = $request->path();
        $supportedLangs = ['ar', 'en'];

        // ✅ اللغة موجودة في URL - مرر مباشرةً
        if (preg_match('#^(ar|en)(/|$)#', $uri)) {
            $currentLang = explode('/', $uri)[0];
            App::setLocale($currentLang);
            Session::put('sign', $currentLang);
            return $next($request);
        }

        // ✅ حدد اللغة من Session أو DB
        if (Session::has('sign') && in_array(Session::get('sign'), $supportedLangs)) {
            $sign = Session::get('sign');
        } else {
            $sign = cache()->remember('default_lang', 3600, fn() =>
                Language::where('is_default', '1')->value('sign') ?? 'ar'
            );
            Session::put('sign', $sign);
        }

        // ✅ 301 مش 302
        return redirect('/' . $sign . '/' . ltrim($uri, '/'), 301);
    }
}