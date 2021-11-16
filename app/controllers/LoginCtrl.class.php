<?php

namespace app\controllers;

use app\forms\LoginForm;
use app\transfer\User;

require_once 'LoginForm.class.php';
require_once 'User.class.php';

class LoginCtrl{
    
    public function __construct(){
            $this->form = new LoginForm();
    }

   //pobranie parametrów
   function getParamsLogin(){
           $this->form->login = getFromRequest('login');
           $this->form->pass = getFromRequest('pass');
   }

   //walidacja parametrów z przygotowaniem zmiennych dla widoku
   function validateLogin(){
           // sprawdzenie, czy parametry zostały przekazane
           if ( ! (isset($this->form->login) && isset($this->form->pass))) {
                   return false;
           }

           // sprawdzenie, czy potrzebne wartości zostały przekazane
           if ( $this->form->login == "") {
                   getMessages()->addError ( 'Nie podano loginu' );
           }
           if ( $this->form->pass == "") {
                   getMessages()->addError ( 'Nie podano hasła' );
           }

           //nie ma sensu walidować dalej, gdy brak parametrów
           if (getMessages()->isError()) {
               return false;
           }
           // sprawdzenie, czy dane logowania są poprawne
           // - takie informacje najczęściej przechowuje się w bazie danych
           //   jednak na potrzeby przykładu sprawdzamy bezpośrednio
           if ($this->form->login == "admin" &&  $this->form->pass == "admin") {

                $user = new User($this->form->login, 'admin');
                // zaipsz obiekt użytkownika w sesji
                $_SESSION['user'] = serialize($user);
                // dodaj rolę użytkownikowi (jak wiemy, zapisane też w sesji)
                addRole($user->role);
                
                return true;
           }
           if ($this->form->login == "user" && $this->form->login == "user") {
               
                $user = new User($this->form->login, 'user');
                // zaipsz obiekt użytkownika w sesji
                $_SESSION['user'] = serialize($user);
                // dodaj rolę użytkownikowi (jak wiemy, zapisane też w sesji)
                addRole($user->role);
                
                return true;
           }

           getMessages()->addError('Niepoprawny login lub hasło');
           return false; 
   }


   public function action_login(){

    $this->getParamsLogin();

        if (!$this->validateLogin()) {
            $this->generateView();   
        } else { 
            header("Location: ".getConf()->app_url."/");
        }
    }
    
    public function generateView(){
		
		getSmarty()->assign('page_title','Strona logowania');
		getSmarty()->assign('form',$this->form);
		getSmarty()->display('LoginView.tpl');		
    }
}