<?php

/*----------------------------------------------------------
| Bootstrap file system
------------------------------------------------------------
| All file system structure will be add here
*/
require_once __DIR__ . '/System/bootstrap.php';


/*----------------------------------------------------------
| Web route
------------------------------------------------------------
| Route manage
*/
require_once __DIR__ . '/App/routes.php';


// match current request
$match = $route->match();

if(!$match)
{
	die('Something went wrong!');
}


