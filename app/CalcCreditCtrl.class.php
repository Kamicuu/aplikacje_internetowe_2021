<?php

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

require_once $conf->root_path.'/lib/smarty/Smarty.class.php';
require_once $conf->root_path.'/lib/Messages.class.php';
require_once $conf->root_path.'/app/CalcCreditForm.class.php';
require_once $conf->root_path.'/app/CalcCreditResult.class.php';

class CalcCreditCtrl {
    
        private $msgs;   //wiadomości dla widoku
	private $form;   //dane formularza (do obliczeń i dla widoku)
	private $result; //inne dane dla widoku
	private $hide_intro; //zmienna informująca o tym czy schować intro
    
        public function __construct(){
		//stworzenie potrzebnych obiektów
		$this->msgs = new Messages();
		$this->form = new CalcCreditForm();
		$this->result = new CalcCreditResult();
		$this->hide_intro = false;
	}
        
        function getParams(){
            $this->form->kwota = isset($_REQUEST ['kwota']) ? $_REQUEST ['kwota'] : null;
            $this->form->oprocentowanie = isset($_REQUEST ['oprocentowanie']) ? $_REQUEST ['oprocentowanie'] : null;
            $this->form->czas_trwania = isset($_REQUEST ['czas_trwania']) ? $_REQUEST ['czas_trwania'] : null;
            
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
			$this->msgs->addError('Nie podano kwoty kredytu');
		}
		if ($this->form->oprocentowanie == "") {
			$this->msgs->addError('Nie podano oprocentowania');
		}
                if ($this->form->oprocentowanie == "") {
			$this->czas_trwania->addError('Nie podano czasu trwania');
		}
                
		
		// nie ma sensu walidować dalej gdy brak parametrów
		if (! $this->msgs->isError()) {
			
			// sprawdzenie, czy $x i $y są liczbami całkowitymi
			if (! is_numeric ( $this->form->kwota )) {
				$this->msgs->addError('Kwota kredytu nie jest liczbą');
			}
			
			if (! is_numeric ( $this->form->oprocentowanie )) {
				$this->msgs->addError('Oprocentowanie kredytu nie jest liczbą');
			}
                        
                        if (! is_numeric ( $this->form->czas_trwania )) {
				$this->msgs->addError('Czas trwania nie jest liczba');
			}
		}
		
		return ! $this->msgs->isError();
	}
        
        public function process(){

		$this->getParams();
		
		if ($this->validate()) {
				
			$this->msgs->addInfo('Parametry poprawne. Wykonuję obliczenia.');
                        
                        $this->form->czas_trwania = intval($this->form->czas_trwania);
                        $stala = 1 + (($this->form->oprocentowanie / 100.00)/12);

                        $this->result->result = $this->form->kwota * pow($stala, $this->form->czas_trwania*12)*($stala-1)/(pow($stala, $this->form->czas_trwania*12)-1);
				
			
			$this->msgs->addInfo('Wykonano obliczenia.');
		}
		
		$this->generateView();
	}
        
        public function generateView(){
		global $conf;
		
                $smarty = new Smarty();
                $smarty->assign('conf',$conf);
                
                $smarty->assign('hide_intro',$this->hide_intro);
		
		$smarty->assign('msgs',$this->msgs);
		$smarty->assign('form',$this->form);
		$smarty->assign('res',$this->result);

                // 5. Wywołanie szablonu
                $smarty->display($conf->root_path.'/app/CalcView.tpl');
	}

}
