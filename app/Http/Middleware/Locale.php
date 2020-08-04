<?php

namespace App\Http\Middleware;

use App\Http\Controllers\LangController;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class Locale
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @param  string|null  $guard
	 * @return mixed
	 */
	public function handle(Request $request, Closure $next, $guard = null)
	{
		// This is the session from LangController.php
		// If it is set we need to redirect to proper formated url
		if( $sessLocale = Session::get(LangController::SESSION_KEY) )
		{
			Session::forget(LangController::SESSION_KEY);
			$route = $request->route();
			$params = array_merge($request->query(), $route->parameters());
			$params['locale'] = $sessLocale;
			return __redirectRoute($route->getName(), $params);
		}

		if( $request->route()->hasParameter('locale') )
		{
			App::setLocale($request->route()->parameter('locale'));
			$request->route()->forgetParameter('locale');
		}

		return $next($request);
	}
}