<?php

//CONFIG DIRECTORY NAME
$directory = "hospital-deve";
// if (!isProduction())
//     $directory .= "-pro";

//URL_BASE
define('URL_BASE', "{$_SERVER['REQUEST_SCHEME']}://{$_SERVER['HTTP_HOST']}/projects/{$directory}");

//PATH_BASE
define("PATH_BASE", "/var/www/html/projects/{$directory}");


//LANG
/** Define Language (pt-br or en) */
define('LANG', 'pt-br');


//DEBUG
define('DEBUG', true);


//MESSAGES
define('MESSAGE_ERROR', 'error');
define('MESSAGE_INFO', 'info');
define('MESSAGE_SUCCESS', 'success');
define('MESSAGE_WARNING', 'warning');

//DATABASE 
define("PROD", "private");

//DATABASE DEFAULT
define("DATABASE_DEFAULT", PROD);


//PAGINATION
define("PERPAGE", 'perPage');
define("PAGE", 'page');

define("AUTHENTICATION_SESS", "authentication");
define("AUTHENTICATION_RESET_SESS_ADMINISTRATIVE", "authResetSess");
define("AUTHENTICATION_RESET_SESS", "authResetSess");

//SESSIONS
define("SESS_OLD", "old");
define("SESS_IS_WRONG", "isWrong");
define("SESS_NOTIFLIX", "notiflix");

//CONFIG MENU ID
define("MENU_ID", "number or text");