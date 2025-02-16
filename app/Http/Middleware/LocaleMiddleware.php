<?php
// app/Http/Middleware/LocaleMiddleware.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class LocaleMiddleware
{
    public function handle($request, Closure $next)
    {

        // في حالة طلب ويب، نستخدم الجلسة لتحديد اللغة
        if ($locale = $request->session()->get('locale')) {
            App::setLocale($locale);
        }

        // في حالة طلب API، نستخدم الهيدر لتحديد اللغة
        if ($request->is('api/*') && $locale = $request->header('lang')) {
            App::setLocale($locale);
        }

        return $next($request);
    }
}
