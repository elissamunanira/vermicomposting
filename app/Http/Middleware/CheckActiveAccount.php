<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;


class CheckActiveAccount
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
        if(auth()->check() && (auth()->user()->status ==0)){
           // Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect('/invalidateError')->with('error','Your Account is not Activated');
        }


        if (auth()->check() && auth()->user()->hasRole('Manager')) {
            $cooperative = auth()->user()->cooperative->first();
       
            if ($cooperative && $cooperative->status == 0) {
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return redirect('/cooperative_invalidateError')->with('error','Your Cooperative is not Activated');
            }
        }
        return $next($request);
    }
}
