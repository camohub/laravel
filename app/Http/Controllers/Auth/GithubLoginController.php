<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Contracts\User as SocialUser;
use Laravel\Socialite\Facades\Socialite;

class GithubLoginController extends Controller
{
	const DRIVER = 'github';


	public function login()
	{
		//return redirect('https://github.com/login/oauth/authorize');
		return Socialite::driver(self::DRIVER)
			//->scopes(['user:follow'])
			->redirect();
	}


	public function callback()
	{
		$gitHubUser = Socialite::driver('github')->user();

		$user = \App\User::where(['email' => $gitHubUser->getEmail(), 'social_network' => self::DRIVER])->first();

		$user = $user ?: $this->createUser($gitHubUser);

		$this->loginUser($user);

		return __redirectRoute('book.index');
	}


	public function loginUser(\App\User $user)
	{
		Auth::login($user);
		flash('You were successfully logged in.', 'success');
	}


	/**
	 * @param SocialUser $gitHubUser
	 * @param int $i
	 * @return \App\User
	 */
	private function createUser( SocialUser $gitHubUser, $i = 1 )
	{
		$name = $gitHubUser->getName() . ($i === 1 ? '' : $i);

		if( \App\User::where(['name' => $name])->first() )
		{
			$i++;
			if( $i <= 10 ) $newUser = $this->createUser($gitHubUser, $i);
		}
		else
		{
			$newUser = new \App\User([
				'name' => $name,
				'email' => $gitHubUser->getEmail(),
				'password' => 'no password',
				'social_network' => self::DRIVER,
				'social_network_params' => json_encode($gitHubUser),
			]);

			$newUser->save();
		}

		return $newUser;
	}
}
