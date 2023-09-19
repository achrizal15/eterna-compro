<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->route('locale');
        if ($locale) {
            if (!in_array($locale, ['en', 'id'])) {
                return abort(404);
            }
        } else {
            return redirect(route('rgpanel.index', ['locale' => 'en']));
        }
        \App::setLocale($locale);
        return $next($request);
    }
}