<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (!auth::check()) {
            return redirect('/login');
        }

        $isAdmin = DB::table('admins')
                    ->where('users_id', auth::user()->id)
                    ->exists();

        if (!$isAdmin) {
            return redirect('/')
                ->with('failure', 'Access denied. Admins only.');
        }

        return $next($request);
    }
}
