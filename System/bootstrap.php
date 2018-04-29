<?php

/*---------------------------------------------
| Include all globe variables
----------------------------------------------*/
require_once __DIR__ . '/configs/core.init.php';

/*---------------------------------------------
| Autoload - Auto loading library from composer
----------------------------------------------*/
require_once ROOT . '/vendor/autoload.php';

/*---------------------------------------------
| Autoload custom PHP library
----------------------------------------------*/
require_once __DIR__ . '/core/AutoloadLibrary.php';

/*----------------------------------------------
| Core Appilcation based on App
-----------------------------------------------*/
require_once __DIR__ . '/core/CoreApplication.php';

/*---------------------------------------------
| Include all application functions and classes
----------------------------------------------*/
require_once __DIR__ . '/App.php';