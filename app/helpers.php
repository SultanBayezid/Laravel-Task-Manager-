<?php

if ( ! function_exists('company_id')){
	function company_id()
	{
		if(Auth::check()){
			if( Auth::user()->company_id != ''){	 
				return Auth::user()->company_id; 
			}else if(Auth::user()->company_id == '' && Auth::user()->user_type == 'admin'){
                return '';
			}else{ 
				return Auth::user()->id;
			}
		}
		return ''; 
	}
}




















