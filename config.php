<?php
const DS = DIRECTORY_SEPARATOR;
$protocol = strpos(strtolower($_SERVER['SERVER_PROTOCOL']), 'https') === FALSE ? 'http' : 'https';
$xampp = ($_SERVER['HTTP_HOST'] === '127.0.0.1') ? '/@Maqtech/agency' : '';
$folder_repo = ($_SERVER['HTTP_HOST'] === '127.0.0.1') ? (dirname(__DIR__)  . DS . "agency") : "";
define('DOMAIN', $protocol . '://' . $_SERVER['HTTP_HOST'] . $xampp);
//define('DOMAIN', "http://127.0.0.1/@Maqtech/agency");
define('TITLE', "Al-Somu");
define('APP',  "App" . DS);
define('DATA', "storage" . DS);
//define('LOGS', dirname(__DIR__) . $folder_repo . DS . "App" . DS . "websys_log" . DS);

define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'yolladbase');
define('DB_USER', 'user123');
define('DB_PASS', '123');

//GOOGLE MAPS API
define('GOOGLE_CLIENT_ID', '1723862280-25sj8n7euemrq3ggdo146qkc0vns9i5a.apps.googleusercontent.com');
define('GOOGLE_CLIENT_SECRET', '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');
