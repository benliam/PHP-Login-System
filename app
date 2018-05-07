#!/usr/bin/php
<?php
/*
    App.php - Console application created by Ben Liam using compontent Console/Symfony
    - Using to create new Controller, Model
*/

define('CmdPath', __DIR__ . '/System/Commands' );

define('CmdTemplates', __DIR__ . '/System/Commands/templates' );

define('APP_PATH', __DIR__ . '/App');

require_once __DIR__ . '/vendor/autoload.php';

// class Autoloader
// {
//     protected static $CommandsFolder = CmdPath;

//     public static function register()
//     {
//         $cmdFile = glob(self::$CommandsFolder . '/*.php');
//         foreach($cmdFile as $command) {
//             require_once $command;
//             return true;
//         } 
//     }
// }
// Autoloader::register();

require_once CmdPath . '/CreateController.php';

use Symfony\Component\Console\Application;

$application = new Application();

# add our commands
$application->add(new CreateController());

$application->run();