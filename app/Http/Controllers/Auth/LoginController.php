<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\App;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

	/**
	 * LoginController constructor.
	 */
    public function __construct()
    {
		$locale = array_key_exists(App::getLocale(), config('locales.other_langs')) ? App::getLocale() : '';
		$this->redirectTo = '/' . $locale;
        $this->middleware('guest')->except('logout');
    }
}
