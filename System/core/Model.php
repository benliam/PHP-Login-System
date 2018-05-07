<?php
namespace App\Http;

class Model extends CoreApplication{

		/**
		 * Define directory of template files
		 */
		protected static $modelDirectory = APP_PATH . '/models';

		protected static $modelExtention = ".model.php";

		/**
		 * This variable to extend the Database Class
		 */
		public $db;	

		// Model construction
		public function __construct() {

			// Set db as $DB from CoreApplication
			$this->db = static::$DB;

		}

		public function test($name) {
			return "OK " . $name;
		}

		// Load model class
		public function load( $modelName = null) {

			$modelPath = self::$modelDirectory . '/' . $modelName . self::$modelExtention;

			// Checkking model file existion
			if(!file_exists($modelPath)) {

				// display error if the model not found
				die("An error occurred! Cannot find model name [{$modelName}] ");


			} else {

				ob_start();
				// require model class
				require_once $modelPath;
				ob_clean();

				$ObjectClass = ucfirst(end(explode('/', rtrim($modelName)))) . "_Model";

 				return new $ObjectClass;

			}

		}	


		
};