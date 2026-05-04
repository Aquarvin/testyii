<?php

defined('YII_DEBUG') or define('YII_DEBUG', (bool)(getenv('YII_DEBUG') !== false ? getenv('YII_DEBUG') : true));
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', YII_DEBUG ? 3 : 0);

$yiiPath = getenv('YII_PATH') ?: '/var/www/yii';
require($yiiPath . '/framework/yii.php');

$config = dirname(__FILE__) . '/protected/config/main.php';

Yii::createWebApplication($config)->run();
