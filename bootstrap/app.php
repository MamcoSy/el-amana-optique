<?php

use LiteFramework\Bootstrap\App;

class Application
{
	/**
	 * Application constructor
	 */
	private function __construct() {}

	/**
	 * Run the application
	 *
	 * @return void
	 */
	public static function run(): void
	{
		// Directory separator
		define('DS', DIRECTORY_SEPARATOR);

		// Root directory path
		define('ROOT_DIR', dirname(__DIR__));

		// running the app
		App::run();

	}
}
