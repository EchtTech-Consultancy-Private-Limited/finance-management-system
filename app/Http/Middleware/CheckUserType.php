<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $type
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $type)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect('/login');
        }

        switch ($type) {
            case 'admin':
                if ($user->user_type !== 'admin') {
                    abort(401, 'Unauthorized ! Not Permmited');
                }
                break;

            case 'institute':
                if ($user->user_type !== '1') {
                    abort(401, 'Unauthorized ! Not Permmited');
                }
                break;

            case 'national':
                if ($user->user_type !== '0') {
                    abort(401, 'Unauthorized ! Not Permmited');
                }
                break;

            default:
                abort(401, 'Unauthorized ! Not Permmited');
        }

        return $next($request);
    }
}
