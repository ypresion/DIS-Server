<?php

/** 
 * This config file defines constants, autoloader, 
 * error and exception handlers for the application.
 */

define('BASEPATH', '/kf6012/coursework/part1/');
define('DIS_DATABASE', 'db/dis.sqlite');
define('USER_DATABASE', 'db/user.sqlite');
define('DEVELOPMENT_MODE', false);
define('SECRET_KEY', 'LK2CyJtPjBVuc5lcyuIxJ1seI1U0bPHv');

ini_set('display_errors', DEVELOPMENT_MODE);
ini_set('display_startup_errors', DEVELOPMENT_MODE);

include 'config/autoloader.php';
spl_autoload_register('autoloader');

include 'config/htmlexceptionhandler.php';
include 'config/jsonexceptionhandler.php';
set_exception_handler("JSONexceptionHandler");

include 'config/errorhandler.php';
set_error_handler("errorHandler");
