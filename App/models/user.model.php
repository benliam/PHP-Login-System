<?php

use App\Http\Model;
use App\Components\Session\Session;
use App\Components\Encrypt\Hash;

class User_Model extends Model {

	public $session;

	public $hash;


	public function __construct( $userid = null ) {

		// Auto load parent's construction
		parent::__construct();

		$this->session = new Session();

		$this->hash = new Hash();

	}

	public function uid(){

		return $this->session->get(USER_KEY);

	}


	/**
	 * Check user logged in
	 */
	function isLogged() {
			
		if(!$this->session->exist(USER_KEY)) return false;
		
		return true;  	
	}


	/**
	 * Get user information by user id
	 */
	public function getInfo($user_id = null){

		$this->db->where('id', $user_id);

		$userData = $this->db->getOne('members');

		// Remove password into userData to more security
		unset($userData['password']);

		// Return all user information
		return $userData;

	}

	/**
	 * Register new account
	 */

	public function register($username = null, $password = null, $confirmPassword = null, $email = null, $firstname = null, $lastname = null, $phone = null) {

		// Checking username validation
		if (!preg_match("/^[a-zA-Z0-9-_]*$/",$username)) return $this->getError(6);

		// checking user existion
		if($this->checkUserExist($username)) return $this->getError(1, $username);

		// Checking email validation
		if(!checkEmail($email)) return $this->getError(2);

		//  Checking email existion
		if($this->checkEmailExist($email)) return $this->getError(5);

		// Check phone number
		if($phone == null || $phone == '') return $this->getError(8);

		// Check password matching
		if($confirmPassword != $password) return  $this->getError(7);


		$dataCreate = [
			'username' => $username,
			'password' => $this->hash->password($password), // Using Hash Libray to encrypt password to hash
			'email' => $email,
			'first_name' => $firstname,
			'last_name' => $lastname,
			'phone' => $phone,
			'active' => 1,
			'date_created' => time(),
		];

		$Processing = $this->db->insert('members', $dataCreate);

		if($Processing) {
			return $this->getError(0);
		}
		else {
			return $this->getError(99);
		}
			
	}



	/**
	 * Check email registerd or not
	 */
	public function checkEmailExist($email) {

		$this->db->where('email', $email);

		$query = $this->db->getOne('members');

		if($query) return true;

		return false;


	}

	public function checkUserExist($username) {

		$this->db->where('username', $username);

		$query = $this->db->getOne('members');

		// if query executed then user exists
		if($query) {
			return true;
		}
		else {
			return false;
		}

	}

	/**
	 * Error hanle messages
	 */
	public function getError($errorCode = null, $params = array()) {

		$errorHandle = [
			99 => 'An error occured!',
			0 => 'Everything is fine!',
			1 => 'Username %s already exists!',
			2 => 'Email address is invalid, please try another',
			3 => 'Password must be at least 6 chars longer',
			4 => 'Password doesn\'t match! Please check your entries',
			5 => 'This email address is already taken',
			6 => "Username is not valid",
			7 => "Password doesn't match!",
			8 => "Phone number cannot be empty!"
		];

		return [
			'code' => $errorCode,
			'message' => vsprintf($errorHandle[$errorCode],$params)
		];

	}

}