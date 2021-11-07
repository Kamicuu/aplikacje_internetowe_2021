<?php
error_reporting(0);
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';
require_once _ROOT_PATH.'/lib/smarty/Smarty.class.php';

// W kontrolerze niczego nie wysyła się do klienta.
// Wysłaniem odpowiedzi zajmie się odpowiedni widok.
// Parametry do widoku przekazujemy przez zmienne.

// 1. pobranie parametrów

include _ROOT_PATH.'/security/check.php';

$kwota = $_REQUEST ['kwota'];
$oprocentowanie = $_REQUEST ['oprocentowanie'];
$czas_trwania = $_REQUEST ['czas_trwania'];

function getParams(&$form){
    $form['kwota'] = isset($_REQUEST['kwota']) ? $_REQUEST['kwota'] : null;
    $form['oprocentowanie'] = isset($_REQUEST['oprocentowanie']) ? $_REQUEST['oprocentowanie'] : null;
    $form['czas_trwania'] = isset($_REQUEST['czas_trwania']) ? $_REQUEST['czas_trwania'] : null;	
}

// 2. walidacja parametrów z przygotowaniem zmiennych dla widoku


function validate(&$form,&$infos,&$msgs,&$hide_intro){
    
// sprawdzenie, czy parametry zostały przekazane
if ( ! (isset($form['kwota']) && isset($form['oprocentowanie']) && isset($form['czas_trwania']) ))	return false;	

$hide_intro = true;

$infos [] = 'Przekazano parametry.';

// sprawdzenie, czy potrzebne wartości zostały przekazane
if ( $form['kwota'] == "") $msgs [] = 'Nie podano kwoty kredytu';
if ( $form['oprocentowanie'] == "") $msgs [] = 'Nie podano oprocentowania';
if ( $form['czas_trwania'] == "") $msgs [] = 'Nie podano oprocentowania';

//nie ma sensu walidować dalej gdy brak parametrów

if ( count($msgs)==0 ) {
		// sprawdzenie, czy $x i $y są liczbami całkowitymi
		if (! is_numeric( $form['kwota'] )) $msgs [] = 'Kwota kredytu nie jest liczbą';
		if (! is_numeric( $form['oprocentowanie'] )) $msgs [] = 'Oprocentowanie nie jest liczbą';
                if (! is_numeric( $form['czas_trwania'] )) $msgs [] = 'Czas trwania nie jest liczbą';
	}
        
        	if (count($msgs)>0) return false;
	else return true;
 }
 
// 3. wykonaj zadanie jeśli wszystko w porządku
function process(&$form,&$infos,&$msgs,&$result){
	$infos [] = 'Parametry poprawne. Wykonuję obliczenia.';
	
        //konwersja parametrów na int
	$form['czas_trwania'] = intval($form['czas_trwania']);
	$stala = 1 + (($form['oprocentowanie'] / 100.00)/12);
        
        $result = $form['kwota'] * pow($stala, $form['czas_trwania']*12)*($stala-1)/(pow($stala, $form['czas_trwania']*12)-1);
        
        
}

//inicjacja zmiennych
$form = null;
$infos = array();
$messages = array();
$result = null;
	
getParams($form);
if ( validate($form,$infos,$messages,$hide_intro) ){
	process($form,$infos,$messages,$result);
}
$smarty = new Smarty();

$smarty->assign('app_url',_APP_URL);
$smarty->assign('root_path',_ROOT_PATH);
$smarty->assign('page_title','Przykład 04');
$smarty->assign('page_description','Profesjonalne szablonowanie oparte na bibliotece Smarty');
$smarty->assign('page_header','Szablony Smarty');

//pozostałe zmienne niekoniecznie muszą istnieć, dlatego sprawdzamy aby nie otrzymać ostrzeżenia
$smarty->assign('form',$form);
$smarty->assign('result',$result);
$smarty->assign('messages',$messages);
$smarty->assign('infos',$infos);

// 5. Wywołanie szablonu
$smarty->display(_ROOT_PATH.'/app/calc.tpl');