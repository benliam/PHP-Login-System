<?php
/*----------------------------------- PHP Hash library --------------------------------------
| PHP library hashing string
| This library using functions password_hash to encypt string and password_verify hash string 
| @author Ben Liam <raylian2796@gmail.com>
-------------------------------------------------------------------------------------------*/

namespace App\Components\Encrypt;

class Hash {


	/**
	 * [Using fucntion password_hash to encrypt string to encrypted password]
	 * @param  [string] $value [input password]
	 * @return [string]        [hash]
	 */
	public function password($value){

		return password_hash($value, PASSWORD_BCRYPT, ['cost' => 10]);

	}

	/**
	 * [Checking password and verify]
	 * @param  [type] $value [description]
	 * @return [type]        [description]
	 */
	public function passwordCheck($value, $hash){
		
		return password_verify($value, $hash); // It will return true or false
			
	}	



}