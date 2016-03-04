<?php

#region Constant
define('Model_DIR', SYS_DIR.'/Model/');
define('Controller_DIR', SYS_DIR.'/Controller/');
define('View_DIR', SYS_DIR.'/View/');


define('ROOT_HOST', getenv('HTTP_HOST'));
define('ROOT_HOST_H', 'http://'.ROOT_HOST);
define('HTTP_REFERER', getenv('HTTP_REFERER'));
define('REQUEST_URI', getenv('REQUEST_URI'));
define('HTTP_USER_AGENT', getenv('HTTP_USER_AGENT'));

define('USER_IP', getenv('REMOTE_ADDR'));
#endregion Constant

define('IsDebag', false);
if (!IsDebag) {
    error_reporting(0);
}

$Charset = 'utf-8';

#region SQL_DATA
$DbConf['schop']['host'] = 'localhost';
$DbConf['schop']['db_user'] = '';
$DbConf['schop']['db_password'] = '';
$DbConf['schop']['db_name'] = '';
$DbConf['schop']['db_encode'] = 'utf8';
#endregion

require_once Conf_DIR.'start.php';

?>
