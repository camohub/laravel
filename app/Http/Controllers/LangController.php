<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;


class LangController extends Controller
{

	const SESSION_KEY = 'setLocale';


	public function index()
	{
		Session::put(self::SESSION_KEY, App::getLocale());
		//dd($sessLocale = Session::get(LangController::SESSION_KEY));
		return back();
	}
}
