<?php

namespace DigitalsiteSaaS\Progresiveapp;

use Illuminate\Support\ServiceProvider;

/**
* 
*/
class ProgresiveappServiceProvider extends ServiceProvider
{
	
	 public function register()
	{
		$this->app->bind('progresiveapp', function($app) {
			return new ProgresiveApp;

		});
	}

	public function boot()
	{
		require __DIR__ . '/Http/routes.php';


		$this->loadViewsFrom(__DIR__ . '/../views', 'progresiveapp');

		$this->publishes([

			__DIR__ . '/migrations/2015_07_25_000000_create_usuario_table.php' => base_path('database/migrations/2015_07_25_000000_create_usuario_table.php'),

			]);


	}

}

