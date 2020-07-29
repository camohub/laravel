<?php

use Illuminate\Support\Facades\App;


function aUser()
{
	return \Illuminate\Support\Facades\Auth::user();
}

function dunp($var)
{
	echo '<pre>';
	print_r($var);
	echo '</pre>';
}


function __route($name, $params = [])
{
	$locale = $params['locale'] ?? App::getLocale();

	if( array_key_exists($locale, config('locales.other_langs') ) )
	{
		$params['locale'] = $locale;
		return route('locale.' . $name, $params);
	}

	unset($params['locale']);
	return route($name, $params);
}


function __redirectRoute($name, $params = [])
{
	$locale = $params['locale'] ?? App::getLocale();  // Has to be able switch locale or use current locale

	if( array_key_exists($locale, config('locales.other_langs') ) )  // Except default locale
	{
		$params['locale'] = $locale;
		return redirect()->route('locale.' . $name, $params);
	}

	unset($params['locale']);
	$name = str_replace('locale.', '', $name);
	return redirect()->route($name, $params);
}