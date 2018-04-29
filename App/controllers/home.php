<?php

use App\Http\Controller;

class Home extends Controller {
	
	public function __construct() {

		parent::__construct();
	}	

	public function Index() {

		$template = static::$view->render('hello.php', ['name' => 'Ben Liam']);

		echo $template;

	}		

}
