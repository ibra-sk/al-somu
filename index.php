<?php
//date_default_timezone_set('Africa/Kampala');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'config.php';
include 'route.php';

//Libraries
include APP . 'lib/Database.php';

//Hanlders
////include APP . 'lib/Logger.php';
include APP . 'src/ErrorHandle.php';

//Controllers
include APP . 'src/Home.php';

$route = new Route();
$route->add('/', 'Home', '');
$route->add('/home', 'Home', '');
$route->add('/about-us', 'Home', 'aboutPage');
$route->add('/contact-us', 'Home', 'contactPage');




$route->submit();
