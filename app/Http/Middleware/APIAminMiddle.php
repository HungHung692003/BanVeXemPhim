<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class APIAminMiddle
{
    public function handle(Request $request, Closure $next): Response
    {
        $check  =  Auth::guard('admin')->check();
        if(!$check) {
            return response()->json([
                'status'    => 0,
                'message'   => 'Chức năng yêu cầu phải đăng nhập!',
            ]);
        }
        return $next($request);
    }
}
