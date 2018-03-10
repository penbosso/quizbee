<?php

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

defined('SITE_ROOT') ? null : define('SITE_ROOT', 'C:'.DS.'wamp64'.DS.'www'.DS.'impulse');
defined('LIB_PATH') ? null :define('LIB_PATH', SITE_ROOT.DS.'include');

require_once(LIB_PATH.DS.'config.php');
require_once(LIB_PATH.DS.'functions.php');
require_once(LIB_PATH.DS.'session.php');
require_once(LIB_PATH.DS.'database.php');
require_once(LIB_PATH.DS.'user.php');

?>