<?php

namespace App\Http\Middleware;

use App\Enums\RolesType;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next, String $role): Response
    {
        $role = RolesType::from($role);
        if ($request->user()->role == $role) {
            return $next($request);
        }
        abort(403, 'Unauthorized action');
    }
}
