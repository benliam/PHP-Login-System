<?php

use App\Http\Controller;

class Index extends Controller {
	
	public function __construct() {

		parent::__construct();
	}	

	public function Welcome() {

		echo "Hello from Ben";

	}		

}
