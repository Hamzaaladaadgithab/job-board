<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OnlyMe
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->email === "salih@gmail.com") {

            // Kullanıcı doğru -> devam et
            return $next($request);
        }

        // Eğer koşul sağlanmazsa geri yönlendir
        return redirect('/login');
        // Alternatif: return abort(403, 'Yetkisiz erişim');
    }
}
