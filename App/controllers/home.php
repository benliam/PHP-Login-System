<?php

use App\Http\Controller;

class Home extends Controller {
		
	public $user;
		
	public function __construct() {

		parent::__construct();

		// Load model User
		$this->user = $this->model->load('user');

	}	

	public function Index() {

		if($this->user->isLogged()) $data = $this->user->getInfo($this->user->uid());

		var_dump($data);

	}		

	public function test(){

		$output = static::$view->render('user/test.view.php');

		echo $output;

	}	
}
