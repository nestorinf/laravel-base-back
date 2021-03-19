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
    public function handle(Request $request, Closure $next)
    {
        $roles = Role::get();
        // $isRolExist = Arr::has($roles->)
        // if() {

        // }
        dd($request->user()->roleUser()->roles()->get());
        return $next($request);
    }

    public function rolesSlug($role = null)
    {
        $roleColletion = collect($role);
        $rolesMap = $roleColletion->map(function ($item, $key) {
            return $item->slug;
        });
        return $rolesMap;
    }
}
