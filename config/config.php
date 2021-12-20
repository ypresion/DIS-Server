<?php

define('BASEPATH', '/kf6012/coursework/part1/');
define('DIS_DATABASE', 'db/dis.sqlite');
define('USER_DATABASE', 'db/user.sqlite');
define('DEVELOPMENT_MODE', true);

ini_set('display_errors', DEVELOPMENT_MODE);
ini_set('display_startup_errors', DEVELOPMENT_MODE);

include 'config/autoloader.php';
spl_autoload_register('autoloader');

include 'config/htmlexceptionhandler.php';
include 'config/jsonexceptionhandler.php';
set_exception_handler("JSONexceptionHandler");

include 'config/errorhandler.php';
set_error_handler("errorHandler");
