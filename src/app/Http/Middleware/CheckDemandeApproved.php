<?php

namespace App\Http\Middleware;

use App\Services\User\userService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckDemandeApproved
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        $user = userService::getLogedUser();
        $demande = $user->demandes()->latest()->first();
        if (!$demande || $demande->status !== 'approved') {
            Auth::logout();
            return redirect()->route('login')
                ->withErrors(['email' => 'Compte non approuvé']);
        }
        return $next($request);
    }
}
