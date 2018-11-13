<?php
ini_set('max_execution_time', 300); 

// change the following paths if necessary
$yii=dirname(__FILE__).'/protected/yii-1.1.8/framework/yiilite.php';
$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',false);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);


if(strpos($_SERVER['REQUEST_URI'], '/gii/model/diff/id/') !== false || strpos($_SERVER['REQUEST_URI'], '/gii/crud/diff/id/') !== false) {
    error_reporting(0);
    ini_set('display_errors', 0);
}

require_once($yii);
Yii::createWebApplication($config)->run();
