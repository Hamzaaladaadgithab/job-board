<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next , ...$roles): Response
    {

 // Kullanıcı giriş yapmış mı kontrol ediyor
    if(Auth::check()) {
// Eğer giriş yapılmışsa, giriş yapan kullanıcının rolünü alıyoruz
    $role = Auth::user()->role;
// Bu rol, middleware çağrılırken parametre olarak verilen rollerin içinde mi kontrol ediyor
    $hasaccess = in_array($role, $roles);
// Eğer rol listedeki rollerden biri değilse, yani yetkisi yoksa
    if (!$hasaccess) {

// 403 (Forbidden) hatası döndürülür ve işlem burada durur
        abort(403, 'غير مصرح لك (Unauthorized)');
    }
}


 // Eğer kullanıcı giriş yapmamışsa veya yetkisi varsa,
// middleware zinciri devam eder (bir sonraki middleware veya controller çalışır)
        return $next($request);
    }

}
