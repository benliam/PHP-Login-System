<?php

/*------------------------------------------------------
| Core Initial configuration for project
--------------------------------------------------------
| This file wil handles all global variables to using
| whole system
*/

define('HOST', 'http://demo.com');

define('PROJECT_NAME', 'Simple PHP Login system');

define('URL', $_SERVER['REQUEST_URI']);


/*------------------------------------------------------
| MYSQL Configuration
--------------------------------------------------------
| This project will be used MySQLi database system
| define username, password, and database name
*/

define('DB_HOST', 'localhost'); // MYSQL Hostname

define('DB_USERNAME', 'root'); // MYSQL Username

define('DB_PASSWORD', 'admin@123'); // MYSQL Password

define('DB_NAME', 'project1'); // Database name

define('DB_PORT', 3306); // MYSQL Port

define('DB_CHARSET', 'utf-8'); // MYSQL  Charset type


/*-------------------------------------------------------
| Setting Timezone and Debugging mode
---------------------------------------------------------
| Config the project timezone by define variable 'Timezone'
| find your supported locale timezone at 'http://php.net/manual/en/timezones.php'
| Set 0 To set disable debugging mode and 1 to set enable.
*/

define('TIMEZONE', 'Asia/Ho_Chi_Minh');

define('DEBUGGING', 1);


/*--------------------------------------------------------
| Folder structure
----------------------------------------------------------
| These variables will define all system directory path
| included Root path, path to config folder, App folder
*/


/***************** ROOT Path *******************/
if (!defined('ROOT'))
	define('ROOT', rtrim( $_SERVER['DOCUMENT_ROOT'] , '/'));


/***************** App Path *******************/
if (!defined('APP_PATH'))
	define('APP_PATH', ROOT . '/App');


/***************** App Path *******************/
if (!defined('ABSPATH'))
	define('ABSPATH', ROOT . '/System');



/*------------------------------------------------------------
| Including child configuration file
--------------------------------------------------------------
| All child configuration file will be included in this core
| file config at the bottom by using PHP require_once function
*/

require_once __DIR__ . '/Sessions.php';
