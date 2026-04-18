<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $roles): Response
    {
        $userId = Auth::id();
        $user = User::with('roles')->find($userId);
        if ($user && !in_array($user->roles[0]->name, explode('@', $roles))) {
            return redirect()->route('index');
        }
        return $next($request);
    }
}
