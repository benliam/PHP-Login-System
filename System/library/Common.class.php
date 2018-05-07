<?php
/**
   Common functions to be using in Core Application
 	Author: Ben Liam <raylian2796@gmail.com>
*/

/**
 * Redirecting to the url defined
 */
function redirect($url, $callbackUrl = null) {

	$url = $callbackUrl == null ? $url : $url . '?' . urlencode($callbackUrl);

	header("Location: {$url}");
}

/**
	 * Check email validation
	 */	
function checkEmail($emailAddress) {
	if (!filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {
	 return false;
	}

	return true;
}