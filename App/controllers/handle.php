<?php

use App\Http\Controller;

class Handle extends Controller {
		
		
	public function __construct() {

		parent::__construct();

	}	

	public function Page404() {

		$output = static::$view->render('pages/404.html');

		echo $output;

		

	}		

}
