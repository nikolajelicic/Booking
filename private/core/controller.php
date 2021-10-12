<?php 

namespace App\Core;

use App\Core\Database\DatabaseConnection;

class Controller{
    private $dbc;
    private $data;

    final public function __construct(DatabaseConnection &$dbc){
        $this->dbc = $dbc;
    }

    final public function &getDatabaseConnection(): DatabaseConnection{
        return $this->dbc;
    }

    final protected function set(string $name, $value): bool{
        $result = false;

        if(preg_match('/^[a-z][a-z0-9]+(?:[A-Z][a-z0-9]+)*$/', $name)){
            $this->data[$name] = $value;
            $result = true;
        }
        return $result;
    }

    final public function msg($status, $message){
        $message = array(
            "status" => $status,
            "message" => $message
        );
        echo json_encode($message);
    }

    final public function getData(){
        return $this->data;
    }

    final public function redirect(string $path){
        return header("Location:{$path}");
    }
}
?>