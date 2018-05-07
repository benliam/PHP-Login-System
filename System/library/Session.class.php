<?php
namespace App\Components\Session;


class Session {

	/**
	 * Set a session value
	 */
	public function set($sessionName, $value) {

		$_SESSION[$sessionName] = $value;

	}

	// Check a session exists or not
	public function exist($session) {

		// if this session doesnt exist then return false
		if(!$_SESSION[$session]) return false;

		return true;

	}

	/**
	 * Get a session value
	 */
	public function get($session) {

		return $_SESSION[$session];

	}

	/**
	 * Unset a session
	 */
	public function delete($session) {
		 unset($_SESSION[$session]);
	}

	/**
	 * Destroy all session
	 */
	public function destroy() {
		
		return session_destroy();
	}

}

