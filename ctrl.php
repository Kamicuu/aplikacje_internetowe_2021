<?php
//error_reporting(0);
// Skrypt kontrolera głównego uruchamiający określoną
// akcję użytkownika na podstawie przekazanego parametru

////każdy punkt wejścia aplikacji (skrypt uruchamiany bezpośrednio przez klienta) musi dołączać konfigurację
//require_once dirname (__FILE__).'/../config.php';
//// import funkcji php
//require_once dirname(__FILE__).'/functions.php';


require_once 'init.php';

//2. wykonanie akcji

getRouter()->setDefaultRoute('calcShow'); // akcja/ścieżka domyślna
getRouter()->setLoginRoute('login'); // akcja/ścieżka na potrzeby logowania (przekierowanie, gdy nie ma dostępu)

getRouter()->addRoute('calcShow', 'CalcCtrl',  ['user','admin']);
getRouter()->addRoute('calcCompute', 'CalcCtrl',  ['user','admin']);
getRouter()->addRoute('calcCreditCompute', 'CalcCreditCtrl',  ['user','admin']);
getRouter()->addRoute('login', 'LoginCtrl');

getRouter()->go(); //wybiera i uruchamia odpowiednią ścieżkę na podstawie parametru 'action';

