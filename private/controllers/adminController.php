<?php 

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Validate;
use App\Models\HousesModel;
use App\Models\RoomsModel;
use App\Models\ReservationsModel;
use App\Models\UserModel;

class AdminController extends Controller{

    public function admin(){
        $housesModel = new HousesModel($this->getDatabaseConnection());
        $houses = $housesModel->getAll();
        $this->set('houses',$houses);
    }

    public function addNewHouse(){
        $housesModel = new HousesModel($this->getDatabaseConnection());
        $validate = new Validate;

        $name = $_POST['name'];
        $description = $_POST['description'];
        $img = time().$_FILES['image']['name'];
        $city = $_POST['city'];
        $address = $_POST['address'];
        $id = $_POST['userId'];
        $target = "houses/".basename($img);

        if($validate->stringValidate($name)==false){
            $this->set("false","Ime nije ispravno");
        }elseif($validate->stringValidate($description)==false){
            $this->set("false","Opis nije ispravan");
        }elseif($validate->stringValidate($address)==false){
            $this->set("false","Ulica nije ispravna");
        }elseif(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
            if($housesModel->addHouses($name,$description,$img,$city,$address,$id)==true){
                $this->set("true","Uspesno ste dodali kucu");
            }else {
                $this->set("false","Doslo je do greske, pokusajte ponovo");
            }
        }
    }

    public function addNewRoom(){
        $roomModel = new RoomsModel($this->getDatabaseConnection());
        $validate = new Validate;

        $name = $_POST['room_name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $img = $_FILES['file']['name'];
        $contact = $_POST['contact'];
        $idHouse = $_POST['idHouse'];
        $beds = $_POST['beds'];
        $person = $_POST['max_person'];
        $pictures = [];

        if($validate->stringValidate($name)==false){
            $this->set("false","Ime nije ispravno");
        }elseif($validate->stringValidate($description)==false){
            $this->set("false","Opis nije ispravan");
        }elseif($validate->phoneValidate($price)==false){
            $this->set("false","Cena nije ispravna");
        }elseif($validate->phoneValidate($contact)==false){
            $this->set("false","Kontakt telefon nije ispravan");
        }elseif($validate->phoneValidate($beds)==false){
            $this->set("false","Broj kreveta nije ispravan");
        }elseif($validate->phoneValidate($person)==false){
            $this->set("false","Maksimalan broj osoba nije ispravan");
        }else{
            for($i=0;$i<count($_FILES['file']['name']);$i++){
            if(move_uploaded_file($_FILES['file']['tmp_name'][$i],'rooms/'.time().$img[$i])){
              array_push($pictures,time().$img[$i]);
            }
          }
          $json_img = json_encode($pictures);
            if($roomModel->addRoom($name,$description,$price,$json_img,$contact,$idHouse,$beds,$person)==true){
            $this->set("true","Uspesno ste dodali novu sobu");
            }else{
            $this->set("false","Doslo je do greske");
            }
        }
    }

    public function allUsers(){
        $userModel = new UserModel($this->getDatabaseConnection());
        $users = $userModel->getAll();
        $this->set('users',$users);
    }

    public function reservations(){
        $rezervationsModel = new ReservationsModel($this->getDatabaseConnection());
        $data = $rezervationsModel->getAllReservations();
        $this->set('data',$data);
    }

    public function houses(){
        $housesModel = new HousesModel($this->getDatabaseConnection());
        $houses = $housesModel->getAll();
        $this->set('houses',$houses);
    }   

    public function getHouseById(){
        $id = intval(substr(implode($_GET),12));
        $housesModel = new HousesModel($this->getDatabaseConnection());
        $house = $housesModel->getById($id);
        $this->set('house',$house);
    }

}
?>