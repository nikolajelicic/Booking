<?php 

namespace App\Core;

class Session{

    public function __construct() {
        session_start();
    }

    public function setSessionId($id){
        return $_SESSION['id'] = $id;
    }

    public function sessionName($name,$surname){
        return $_SESSION['name'] = $name . ' ' . $surname;
    }
}


?>