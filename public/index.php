<?php

defined('APPLICATION_PATH') || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../app'));
const DS = DIRECTORY_SEPARATOR;

require APPLICATION_PATH . DS . 'config' . DS . 'config.php';

/* get page.php if no get home.php instead... */
$page = get('page', 'home');

$model = $config['PATH2_MODEL'] . $page . '.php';
$view = $config['PATH2_VIEW'] . $page . '.phtml';
$_404 = $config['PATH2_VIEW'].'404.phtml';

if (file_exists($model)) {
    require $model;
}

$main_content = $_404;
if(file_exists($view)){
    $main_content = $view;
}

include $config['PATH2_VIEW'].'layout.phtml';