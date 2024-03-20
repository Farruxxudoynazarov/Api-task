<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
      
        $user = auth()->user();

        if ($user && $user->role == 'company') {
            // CompanyMiddleware logikasini bajarish
            return $next($request);
            // Masalan, CompanyMiddleware'ning ichidagi kodni bu yerga kiritishingiz mumkin
        } elseif ($user && $user->role == 'admin') {
            // AdminMiddleware logikasini bajarish
            return $next($request);
            // Masalan, AdminMiddleware'ning ichidagi kodni bu yerga kiritishingiz mumkin
        } else {
            return response()->json(['message' => 'Ruxsat berilmagan'], 403);
        }

    } 
    
    }

