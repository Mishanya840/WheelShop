<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;

class isAdmin {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if ($request->user())
		{
			if ($request->user()['admin'])
			{
				$oldPath = $request->path();
				return new RedirectResponse(url('/admin/'.$oldPath));
			}
		}
		return $next($request);
	}

}
