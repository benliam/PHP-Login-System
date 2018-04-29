<?php

namespace App\Http;

class CoreApplication {
	
	public static $DB;

	/*------------------------------------------------------
	| _Autoload() function
	--------------------------------------------------------
	| This function will load all classes which been define
	| by developer
	*/
	public static function __autoload() {

		self::$DB = new \MysqliDB;

	}

}