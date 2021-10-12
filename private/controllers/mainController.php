<?php 

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Session;
use App\Core\Validate;
use App\Models\UserModel;
use App\Models\HousesModel;
use App\Models\RoomsModel;

class MainController extends Controller{

    public function index(){
        $housesModel = new HousesModel($this->getDatabaseConnection());
        $houses = $housesModel->getAll();
        $this->set('houses',$houses);

        //for pagination
        //$housesModel = new HousesModel($this->getDatabaseConnection());
        //$pagination = 0;
        //$pagination = $housesModel->getRowCount()/4;
        //echo $pagination;
    }

    public function login(){
        
    }

    public function authUser(){
        $email =  htmlspecialchars(strip_tags($_POST['email'])) ;
        $password =  htmlspecialchars(strip_tags(hash('sha256',$_POST['password']))) ;
        $userModel = new UserModel($this->getDatabaseConnection());
        $users = $userModel->login($email,$password); 
        $this->set('users',$users);
        if($users == NULL){
            $this->msg("false","Uneti podatci nisu ispravni.");
        }else{
            foreach($users as $user){
                $session = new Session();
                if($user->role_idrole==1){
                    $_SESSION['role'] = 'admin';
                    $_SESSION['id'] = $user->idusers;
                    $this->msg("true","admin");
                }else{
                    $_SESSION['role'] = 'user';
                    $_SESSION['id'] = $user->idusers;
                    $this->msg("true","user");
                }
            }
        }
    }

    public function register(){
        $name =  htmlspecialchars(strip_tags($_POST['name']));
        $surname =  htmlspecialchars(strip_tags($_POST['surname']));
        $email =  htmlspecialchars(strip_tags($_POST['email']));
        $password =  htmlspecialchars(strip_tags(hash('sha256',$_POST['password'])));
        $replacePassword =  htmlspecialchars(strip_tags(hash('sha256',$_POST['replacePassword'])));
        $validate = new Validate;
        $userModel = new UserModel($this->getDatabaseConnection());
            if($validate->stringValidate($name)==false){
                $this->msg("false","Ime nije ispravno");
            }elseif($validate->stringValidate($surname)==false){
                $this->msg("false","Prezime nije ispravno");
            }elseif($validate->passwordValidate($password)==false){
                $this->msg("false","Lozinka nije ispravna");
            }elseif($password!=$replacePassword){
                $this->msg("false","Lozinke nisu iste");
            }elseif($userModel->addNewUser($name,$surname,$email,$password)==true){
                $this->msg("true","Uspesno ste napravili profil");
            }else{
                $this->msg("false","Doslo je do greske, pokusajte ponovo");
            }
    }

    public function logout(){
        session_start();
        session_destroy();
        $this->redirect("index");
    }

    public function getRooms(){
        $id = substr(implode($_GET),15);
        $roomId = intval($id);
        $roomsModel = new RoomsModel($this->getDatabaseConnection());
        $rooms = $roomsModel->getAllByHousesId($roomId);
        $this->set('rooms',$rooms);
        $housesModel = new HousesModel($this->getDatabaseConnection());
        $houses = $housesModel->getById($roomId);
        $this->set('houses',$houses);
    }   

    public function reservation(){
        $id = substr(implode($_GET),17);
        $roomId = intval($id);
        $roomsModel = new RoomsModel($this->getDatabaseConnection());
        $rooms = $roomsModel->getById($roomId);
        $this->set('rooms',$rooms);
    }
}


?>