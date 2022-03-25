<?php

namespace App\Http\Middleware;

use Illuminate\Http\Response;
use Closure;
use Auth;

class Manager
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
		$user_type = Auth::User()->user_type;
		$user_id = Auth::User()->id;
		
		if($user_type == 'user' || $user_type == 'staff'){
			$route_name = \Request::route()->getName();
			if( $route_name != '' && $user_type != 'user'){
				
				if(explode(".",$route_name)[1] == "update"){
					$route_name = explode(".",$route_name)[0].".edit";
				}else if(explode(".",$route_name)[1] == "store"){
					$route_name = explode(".",$route_name)[0].".create";
				}
				if( ! has_permission($route_name, $user_id)){
					return new Response('<h4 class="text-center red">'.('Permission denied !').'</h4>');
				}
			}
		}else{
			return new Response('<h5 class="text-center red">'.('Permission denied !').'</h5>');
		}

	
			
        return $next($request);
    }
}
