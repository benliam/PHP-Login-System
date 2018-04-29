<?php

use  App\Http\Router\Routes;

$route = new Routes;

$route->map('GET', '/' ,'Home@Index');

$route->map('GET', '/home', function(){

	echo "Home";

});




