<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class BlockCheck
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $id = $request->id ?  $request->id : $request->user->id;
        $profile_user = User::findorfail($id);
        if ($profile_user->blocked()->where('user_id', auth()->id())->exists()) {
            abort(403);
        }
        return $next($request);
    }
}
