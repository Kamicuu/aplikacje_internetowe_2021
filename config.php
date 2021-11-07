<?php

require_once 'Config.class.php';

//$conf = new Config();
//$conf->server_name = 'localhost:8080';
//$conf->server_url='http://'.$conf->server_name;
//$conf->app_root='';
//$conf->app_url=$conf->server_name.$conf->app_root;
//$conf->root_path=dirname(__FILE__);
        
define('_SERVER_NAME', 'localhost:8080');
define('_SERVER_URL', 'http://'._SERVER_NAME);
define('_APP_ROOT', '');
define('_APP_URL', _SERVER_URL._APP_ROOT);
define("_ROOT_PATH", dirname(__FILE__));


function out(&$param){
	if (isset($param)){
		echo $param;
	}
}

