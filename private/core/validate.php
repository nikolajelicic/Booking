<?php 

namespace App\Core;

class Validate{ 
    
    public function stringValidate(string $string){
        
        if(strlen($string)<2){
            return false;
        }else {
            return true;
        }
    }

    public function passwordValidate($pass){
        if(strlen($pass)<5){
            return false;
        }else {
            return true;
        }
    }

    public function emailValidate($email){
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            return false;
        }else {
            return true;
        }
    }

    public function numberValidate($number){
        if(!is_numeric($number)){
            return false;
        }else {
            return true;
        }
    }

    public function phoneValidate($phone){
        if(!is_numeric($phone)){
            return false;
        }else {
            return true;
        }
    }

    public function dateValidate($date){
        $re = '/^(((0)[0-9])|((1)[0-2]))(\/)([0-2][0-9]|(3)[0-1])(\/)\d{4}$/m';
        if(preg_match_all($re, $date, $matches, PREG_SET_ORDER, 0)||!empty($date)){
            return true;
        }else{
            return false;
        }

    }
}


?>