<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Role;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$role)
    {
        $roleUser = $request->user()->roleUser()->pluck('slug');
        if (!$this->checkAssignRole($roleUser, $role)) {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
        return $next($request);
    }

    /**
     * Method checking roles assignment user
     * @param array $roles
     * @param array $roleRoute
     * @return boolean
     */

    public function checkAssignRole($roles, array $roleRoute)
    {
        foreach ($roles as $rol) {
            if ($this->hasRole($rol)) {
                if (in_array($rol, $roleRoute)) {
                    return true;
                }
            }
        }
        return false;
    }
    /**
     * Method check rol exist in collection roles for slug
     * @param string $slug
     * @return boolean
     */


    public function hasRole($slug = null)
    {
        $role = Role::where('slug', $slug)->first();
        if (!$role) {
            return false;
        }
        return true;
    }
}
