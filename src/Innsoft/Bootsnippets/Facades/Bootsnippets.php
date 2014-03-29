<?php namespace Innsoft\Bootsnippets\Facades;

use Illuminate\Support\Facades\Facade;

class Bootsnippets extends Facade {
	protected static function getFacadeAccessor() {
		return 'bootsnippets';
	}
}