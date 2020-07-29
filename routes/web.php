<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
$localesPattern = join('|', array_keys(config('locales.other_langs')));

Auth::routes();

Route::middleware(['locale'])->group(function () use ( $localesPattern )
{
	Route::name('locale.')->group(function () use ( $localesPattern )
	{
		/**
		 * Auth routes
		 */
		Route::post('/{locale}/login', 'Auth\LoginController@login')
			->middleware(['web', 'guest']);
		Route::match(['GET', 'HEAD'], '/{locale}/login', 'Auth\LoginController@showLoginForm')->name('login')
			->middleware(['web', 'guest']);
		Route::post('/{locale}/logout', 'Auth\LoginController@logout')->name('logout')
			->middleware(['web']);
		Route::post('/{locale}/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email')
			->middleware(['web', 'guest']);
		Route::match(['GET', 'HEAD'], '/{locale}/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request')
			->middleware(['web', 'guest']);
		Route::post('/{locale}/password/reset', 'Auth\ResetPasswordController@reset')->name('password.update')
			->middleware(['web', 'guest']);
		Route::match(['GET', 'HEAD'], '/{locale}/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset')
			->middleware(['web', 'guest']);
		Route::match(['GET', 'HEAD'], '/{locale}/register', 'Auth\RegisterController@showRegistrationForm')->name('password.reset')
			->middleware(['web', 'guest']);
		Route::post('/{locale}/register', 'Auth\RegisterController@register')->name('register')
			->middleware(['web', 'guest']);

		/**
		 * App routes
		 */
		Route::match( [ 'GET', 'POST' ], '/{locale}', 'BookController@index' )
			->name( 'book.index' )
			->where( 'locale', $localesPattern );

		Route::get( '/{locale}/book/create/{id?}', 'BookController@create' )
			->name( 'book.create' )
			->where( 'id', '[0-9]+' )
			->where( 'locale', $localesPattern );

		Route::post( '/{locale}/book/store', 'BookController@store' )
			->name( 'book.store' )
			->where( 'locale', $localesPattern );

		Route::put( '/{locale}/book/update/{id}', 'BookController@update' )
			->name( 'book.update' )
			->where( 'id', '[0-9]+' )
			->where( 'locale', $localesPattern );

		Route::put( '/{locale}/book/update/{id}', 'BookController@update' )
			->name( 'book.update' )
			->where( 'id', '[0-9]+' )
			->where( 'locale', $localesPattern );

		Route::get( '/{locale}/{book}', 'BookController@detail' )
			->name( 'book.detail' )
			->where( 'locale', $localesPattern );

	});


////////////////////////////////////////////////////////////////////////////////
/////// MIDDLEWARE LOCALE BUT NOT NAME LOCALE /////////////////////////////////
//////////////////////////////////////////////////////////////////////////////


	/**
	 * Auth routes
	 */
	Route::post('/login', 'Auth\LoginController@login')
		->middleware(['web', 'guest']);
	Route::match(['GET', 'HEAD'], '/login', 'Auth\LoginController@showLoginForm')->name('login')
		->middleware(['web', 'guest']);
	Route::post('/logout', 'Auth\LoginController@logout')->name('logout')
		->middleware(['web']);
	Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email')
		->middleware(['web', 'guest']);
	Route::match(['GET', 'HEAD'], '/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request')
		->middleware(['web', 'guest']);
	Route::post('/password/reset', 'Auth\ResetPasswordController@reset')->name('password.update')
		->middleware(['web', 'guest']);
	Route::match(['GET', 'HEAD'], '/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset')
		->middleware(['web', 'guest']);
	Route::match(['GET', 'HEAD'], '/register', 'Auth\RegisterController@showRegistrationForm')->name('password.reset')
		->middleware(['web', 'guest']);
	Route::post('/register', 'Auth\RegisterController@register')->name('register')
		->middleware(['web', 'guest']);




	Route::get( '/lang/{locale}', 'LangController@index' )
		->name( 'lang.index' );

	/**
	 * App routes
	 */
// book must have the same name as variable in action
	Route::get('/github/login', 'Auth\GithubLoginController@login')
		->name('github.login');

	Route::get('/github/login/callback', 'Auth\GithubLoginController@callback')
		->name('github.login.callback');

	Route::match(['GET','POST'], '/', 'BookController@index')
		->name('book.index');
//Route::get('/{id}', 'BookController@detail')->name('book.detail')->where('id', '[0-9]+');
	Route::get('/book/create/{id?}', 'BookController@create')
		->name('book.create')
		->where('id', '[0-9]+');

	Route::post('/book/store', 'BookController@store')
		->name('book.store');

	Route::put('/book/update/{id}', 'BookController@update')
		->name('book.update')
		->where('id', '[0-9]+');

	Route::get('/{book}', 'BookController@detail')
		->name('book.detail');
});