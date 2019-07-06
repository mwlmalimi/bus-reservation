<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
          $company_id = request()->user()->company_id;
          if($company_id === null) {
            //The user is super admin
            return redirect('/companies');
          }
          return redirect()->route('company_buses.index', ['company' => $company_id]);
        }

        return $next($request);
    }
}
