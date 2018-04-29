<?php
ob_start();

/*----------------------------------------------
| Session Starting
----------------------------------------------*/
session_start();

/*----------------------------------------------
| Timezone
----------------------------------------------*/
date_default_timezone_set(TIMEZONE);

/*----------------------------------------------
| Debugging mode
----------------------------------------------*/
error_reporting(DEBUGGING);

require_once __DIR__ . '/core/Database.php';

require_once __DIR__ . '/core/View.php';

require_once __DIR__ . '/core/Controller.php';

require_once __DIR__ . '/core/Router.php';

