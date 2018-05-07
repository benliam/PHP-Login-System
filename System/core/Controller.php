<?php
namespace App\Http;

class Controller extends CoreApplication{

	/*-----------------------------------------------
	| Template variables and classes
	-------------------------------------------------
	| This will define template and view directory
	| variables
	*/
 	protected static $TemplateDirectory = APP_PATH . '/views';

	public static $view = null;

	public static $viewLoader = null;

	public $db;

	/*-----------------------------------------------
	| Model Class
	-------------------------------------------------
	| This will define Model variables
	*/
	public $model = null;


	public function __construct()
	{	
		parent::__autoload();

		self::$viewLoader = new \Twig_Loader_Filesystem(self::$TemplateDirectory);

		self::$view = new \Twig_Environment(self::$viewLoader);	

		$this->db = static::$DB;

		$this->model = new Model;

	}


}