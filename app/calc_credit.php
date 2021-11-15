<?php
error_reporting(0);

require_once dirname(__FILE__).'/../config.php';

//załaduj kontroler
require_once $conf->root_path.'\app\CalcCreditCtrl.class.php';

//utwórz obiekt i użyj
$ctrl = new CalcCreditCtrl();
$ctrl->process();
