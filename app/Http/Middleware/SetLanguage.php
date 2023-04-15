<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $language = $request->session()->get('language', 'en');


        if ($request->has('language')) {
            $language = $request->language;
            $request->session()->put('language', $language);
        }

        App::setLocale($language);

        return $next($request);
    }
}