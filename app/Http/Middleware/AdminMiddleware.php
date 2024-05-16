<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // -----------------假设用户模型里有一个 isAdmin() 方法用来判断用户是否为管理员
        if (! auth()->check() || ! auth()->user()->isAdmin()) {
            // 如果用户未登录或不是管理员，则返回 403 错误
            return redirect('/')->withErrors(['message' => '无权访问，只有管理员可以访问/home']);
        }
        //----------------------------
        return $next($request);
    }
}
