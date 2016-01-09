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
			//dd($request->path());
			//dd($request->url());
			//dd($request->is('/'));
			if (!$request->user()['admin']) {
				return new RedirectResponse(url('/'));
			}

		}
		return $next($request);
	}

}
