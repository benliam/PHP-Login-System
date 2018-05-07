<?php

use App\Http\Controller;
use App\Components\Encrypt\Hash;
use App\Components\Session\Session;

class User extends Controller {

	public $user;

	public $session;

	public function __construct() {

		parent::__construct();

		// Load model user
		$this->user = $this->model->load('user');

		// Load session library
		$this->session = new Session();

	}	

	public function Login() {

		// If user logged then direct to index
		if($this->user->isLogged()) redirect('/');

		// View Data
		$viewData = [
			'title' => 'Login page'
		]; 

		$output = static::$view->render('user/login.view.php', $viewData);

		echo $output;


	}

	public function Register() {

		// If user logged then direct to index
		if($this->user->isLogged()) redirect('/');

		// View Data
		$viewData = [
			'title' => 'Register'
		]; 

		$output = static::$view->render('user/register.view.php', $viewData);

		echo $output;


	}


	/**
	 * Submit login
	 */
	public function submitLogin() {

		// get username value
		$username = trim(addslashes($_POST['username']));
		// get password
		$password = $_POST['password'];

		$user = $this->db->rawQueryOne("SELECT * FROM members WHERE username = '{$username}' OR email = '{$username}'");

		// If user not found
		if(!$user) {

			// send response to client
			die(json_encode([
					'code' => -1,
					'message' => 'Username or email doesn\'t exist'
				]));

		}

		// Check password matches
		if(!Hash::passwordCheck($password, $user['password'])) {

			// send response to client
			die(json_encode([
					'code' => -2,
					'message' => 'Wrong password! Please check your entries'
				]));

		}	


		// Set session USER_KEY as user id
		$this->session->set(USER_KEY, $user['id']);

		echo json_encode([
			'code' => 0,
			'message' => 'Login successed!',
			'callback' => '/',
			]);

	}


	/**
	 * Query submit register page
	 */
	public function submitRegister() {

		$username = trim(addslashes($_POST['username']));
		$password = $_POST['password'];
		$confirmPassword = $_POST['confirmPassword'];
		$email = trim(addslashes($_POST['email']));
		$firstName = $_POST['firstName'];
		$lastName = $_POST['lastName'];
		$phone = $_POST['phone'];

		// Execute register new account and server will response json included {code, message}
		$executing = $this->user->register(
				$username,
				$password,
				$confirmPassword,
				$email,
				$firstName,
				$lastName,
				$phone	
			);

			// if executing responses code = 0 then ok
			if($executing['code'] == 0) {

				$htmlResponse = file_get_contents(APP_PATH . '/views/templates/register-success.php');

				echo json_encode([
						'code' => 0,
						'message' => 'Your account has just been created! Please login',
						'html' => $htmlResponse
					]);
			}

			else {
				echo json_encode($executing);
			}
		}

	


}
