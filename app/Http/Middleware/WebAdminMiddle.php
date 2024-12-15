<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class WebAdminMiddle
{
    public function handle(Request $request, Closure $next): Response
    {
        $check  =  Auth::guard('admin')->check();
        if(!$check) {
            toastr()->error("Chức năng yêu cầu phải đăng nhập!");
            return redirect('/admin/login');
        }
        return $next($request);
    }
}
