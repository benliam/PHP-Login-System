<?php

use  App\Http\Router\Routes;

$route = new Routes;

/** Index page **/
$route->map('GET', '/', 'Home@Index', 'index');

$route->map('GET|POST', '/404.html', 'Handle@Page404', 'page404');


// Login page
$route->map('GET', '/login' ,'User@Login','login');

// Register Page
$route->map('GET', '/register' ,'User@Register', 'register');

// Logout 
$route->map('GET|POST', '/logout', function(){

	echo "<title>Logout</title>";
	echo "Please wait!";

	$session = new App\Components\Session\Session();

	// Get callback URL
	$href = isset($_GET['ref']) ? $_GET['ref'] : '/';

	// Delete session key
	$session->delete(USER_KEY);

	// Redirect client
	redirect($href);

});


// Submit Login
$route->map('POST', '/submit/login' ,'User@submitLogin');

$route->map('POST', '/submit/register', 'User@submitRegister');

$route->map('GET', '/s', function(){

	$a1 = ['a' => 'hello', 'b' => 'Mercy'];

	$demo = array_merge($a1, ['oke' => 'this demo']);

	var_dump($demo);

});









