<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Illuminate\Http\Response|\Symfony\Component\HttpFoundation\Response
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->is_admin) {
            // Nếu người dùng đã đăng nhập và là admin, chuyển hướng đến trang admin
            return redirect()->route('admin.dashboard');
        }
        // Nếu không phải admin hoặc chưa đăng nhập, chuyển hướng đến trang chính của người dùng
        return redirect('/home');
    }
}
