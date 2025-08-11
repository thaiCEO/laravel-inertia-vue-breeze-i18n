<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         if(Auth::user()->isAdmin == 1){
            return $next($request);
        }else {
             // វិលត្រឡប់ទៅ previous page ជាមួយ flash message
            return redirect()->route('admin.show.login')->with('error', 'អ្នកមិនមានសិទ្ធិចូលទៅកាន់ទំព័រនេះទេ។');
        }
    }
}
