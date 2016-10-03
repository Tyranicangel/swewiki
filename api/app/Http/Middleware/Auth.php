<?php namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use App\Session;

class Auth {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$date=Carbon::now();
		if(!$request->header('JWT-AuthToken'))
		{
			abort('401','Unauthorized Access');
		}
		else
		{
			$tkn=$request->header('JWT-AuthToken');
			$userdata=Session::where('token','=',$tkn)->where('expiry','>',$date)->count();
			if($userdata>0)
			{
				$user=Session::where('token','=',$tkn)->where('expiry','>',$date)->orderby('id','desc')->first();
				$user->expiry=Carbon::now()->addHours(3);
				$user->save();
			}
			else
			{
				
				abort('402','Session Timed Out');
			}
		}
		return $next($request);
	}

}
