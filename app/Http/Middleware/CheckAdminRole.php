<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class CheckAdminRole
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
        if (auth()->check() && auth()->user()->role === 'admin') {
            return $next($request);
        }
        // If the user is not an admin, log them out and provide a notification.
        Auth::guard('web')->logout();

        $notification = [
            'message' => 'Not Authorized',
            'alert-type' => 'error'
        ];
        // Authentication failed
        $error_message = 'You are not authorized to access this page⚠️. Contact Admin for further instructions.';
        Session::flash('custom_error_message', $error_message);

        return redirect()->route('login')->with($notification);
    }
}
