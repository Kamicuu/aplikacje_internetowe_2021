<?php

namespace app\controllers;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CalcCreditCtrl
 *
 * @author Kamil
 * 
 */


require_once 'CalcCreditForm.class.php';
require_once 'CalcCreditResult.class.php';

use app\forms\CalcCreditForm;
use app\transfer\CalcCreditResult;


class CalcCreditCtrl {
    
        private $msgs;   //wiadomości dla widoku
	private $form;   //dane formularza (do obliczeń i dla widoku)
	private $result; //inne dane dla widoku
	private $hide_intro; //zmienna informująca o tym czy schować intro
    
        public function __construct(){
		//stworzenie potrzebnych obiektów
		$this->form = new CalcCreditForm();
		$this->result = new CalcCreditResult();
	}
        
        function getParams(){
            $this->form->kwota = getFromRequest('kwota');
            $this->form->oprocentowanie = getFromRequest('oprocentowanie');
            $this->form->czas_trwania = getFromRequest('czas_trwania');
            
        }
        
        public function validate() {
		// sprawdzenie, czy parametry zostały przekazane
		if (! (isset ( $this->form->kwota ) && isset ( $this->form->oprocentowanie ) && isset ( $this->form->czas_trwania ))) {
			// sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
			return false; //zakończ walidację z błędem
		} else { 
			$this->hide_intro = true; //przyszły pola formularza, więc - schowaj wstęp
		}
		
		// sprawdzenie, czy potrzebne wartości zostały przekazane
		if ($this->form->kwota == "") {
			getMessages()->addError('Nie podano kwoty kredytu');
		}
		if ($this->form->oprocentowanie == "") {
			getMessages()->addError('Nie podano oprocentowania');
		}
                if ($this->form->oprocentowanie == "") {
			getMessages()->addError('Nie podano czasu trwania');
		}
                
		
		// nie ma sensu walidować dalej gdy brak parametrów
		if (! getMessages()->isError()) {
			
			// sprawdzenie, czy $x i $y są liczbami całkowitymi
			if (! is_numeric ( $this->form->kwota )) {
				getMessages()->addError('Kwota kredytu nie jest liczbą');
			}
			
			if (! is_numeric ( $this->form->oprocentowanie )) {
				getMessages()->addError('Oprocentowanie kredytu nie jest liczbą');
			}
                        
                        if (! is_numeric ( $this->form->czas_trwania )) {
				getMessages()->addError('Czas trwania nie jest liczba');
			}
		}
		
		return ! getMessages()->isError();
	}
        
        public function action_calcCreditCompute(){

		$this->getParams();
		
		if ($this->validate()) {
                    
                    if (inRole('admin')){
				
			getMessages()->addInfo('Parametry poprawne. Wykonuję obliczenia.');
                        
                        $this->form->czas_trwania = intval($this->form->czas_trwania);
                        $stala = 1 + (($this->form->oprocentowanie / 100.00)/12);

                        $this->result->result = $this->form->kwota * pow($stala, $this->form->czas_trwania*12)*($stala-1)/(pow($stala, $this->form->czas_trwania*12)-1);
				
			
			getMessages()->addInfo('Wykonano obliczenia.');
                     }else{
                         getMessages()->addError('Tylko administrator może wykonać tę operację');
                     }
		}
		
		$this->generateView();
	}
        
        public function generateView(){

		getSmarty()->assign('form',$this->form);
		getSmarty()->assign('res',$this->result);

                // 5. Wywołanie szablonu
                getSmarty()->display('CalcView.tpl');
	}

}
