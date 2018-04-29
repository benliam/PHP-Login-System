<?php
/*
	This file will load and register all classes in folder '/System/library' with extension *.class.php
*/

class AutoloadLibrary {

	protected static $libraryDir = ABSPATH . '/library';

	public static function __load() {

		$libraries = glob(self::$libraryDir . '/*.class.php');

		foreach ($libraries as $lib) {

			require_once $lib;
		}
	}

}	

// Run
AutoloadLibrary::__load();