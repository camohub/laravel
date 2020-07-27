<?php

namespace App\Providers;

use App\Model\BookSearchFilterService;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		if ($this->app->isLocal()) {
			$this->app->register(TelescopeServiceProvider::class);
			//$this->app->register(BookSearchFilterService::class);
		}
		if ($this->app->environment() !== 'production') {
			$this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
		}
	}

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		Schema::defaultStringLength(191);
	}
}
