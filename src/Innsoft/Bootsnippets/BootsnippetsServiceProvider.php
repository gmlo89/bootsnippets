<?php namespace Innsoft\Bootsnippets;

use Illuminate\Support\ServiceProvider;

class BootsnippetsServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('innsoft/bootsnippets');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['bootsnippets'] = $this->app->share(function($app)
		{
			return new Bootsnippets($app['url']);
		});

		$this->app->booting(function()
		{
			$loader = \Illuminate\Foundation\AliasLoader::getInstance();
			$loader->alias('HTML', 'Innsoft\Bootsnippets\Facades\Bootsnippets');
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
