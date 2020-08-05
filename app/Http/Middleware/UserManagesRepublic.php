<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Republic;
use App\User;

class UserManagesRepublic
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle($request, Closure $next)
    {   
        $user = Auth::user();

        if($request->route()->uri == 'api/deleteRepublic/{id}' || $request->route()->uri ==  'api/updateRepublic/{id}'){
            $republic_id = $request->route('id');
            $republic = Republic::findOrFail($republic_id);
           
            if($republic->user_id != $user->id){
                return response()->json(['error' => 'Unauthorized', 'status' => 401]); 
            }
        }
        return $next($request);
    }
}
