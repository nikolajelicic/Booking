<?php 

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Validate;
use App\Models\HousesModel;
use App\Models\UserModel;
use App\Models\ReservationsModel;

class UserController extends Controller{

    public function user(){
        
    }

    public function confirmReservation(){
        $start_time = $_POST['from'];
        $end_time = $_POST['to'];
        $user = $_POST['user'];
        $persons = $_POST['persons'];
        $room = $_POST['room'];
        $price = $_POST['price'];
        $rezervationsModel = new ReservationsModel($this->getDatabaseConnection());
        $validate = new Validate;
        if($validate->dateValidate($start_time)==false||$validate->dateValidate($end_time)==false){
            $this->msg("false","Datum nije ispravan");
        }elseif($validate->numberValidate($persons)==false){
            $this->msg("false","Cena nije ispravna");
        }else{
            $days = (strtotime($end_time)-strtotime($start_time))/86400;
            $total = $persons*($days*$price);
            if($rezervationsModel->getReservationByDate($start_time,$end_time,$room)==false){
                $this->msg("false","Trazena soba je zauzeta u naznacenom datumu");
            }elseif($rezervationsModel->newReservation($start_time,$end_time,$total,$user,$room,$persons)==true){
                $this->msg("true","Uspesno ste rezervisali sobu u vremenskom peripodu od ".$start_time." do ".$end_time);
            }else {
                $this->msg("false", "Doslo je do greske, pokusajte ponovo");
            }
        }
    }

    public function myReservations(){
        $user = substr(implode($_GET),19);
        $rezervationsModel = new ReservationsModel($this->getDatabaseConnection());
        $data = $rezervationsModel->getReservationByUserId($user);
        $this->set('data',$data);
    }

    public function changePassword(){
   
    } 

    public function confirmPassword(){
        $oldPassword = $_POST['oldPass'];
        $id = intval($_POST['id']);
        $newPassword = $_POST['newPass'];
        $replacePassword = $_POST['replacePass'];

        $hashOldPassword = hash('sha256',$oldPassword);
        $hashPassword = hash('sha256',$newPassword);

        $userModel = new UserModel($this->getDatabaseConnection());
        $validate = new Validate;

            if($validate->passwordValidate($newPassword)==false){
                $this->msg("false","Lozinka nije ispravna");
            }elseif($newPassword!=$replacePassword){
                $this->msg("false","Lozinke nisu iste");
            }elseif($userModel->updatePassword($hashPassword,$oldPassword,$id)==true){
                $this->msg("true", "Uspesno ste promenili sifru");
            }else{
                $this->msg("false", "Doslo je do greske, pokusajte ponovo");
            }
    }

    public function deleteReservation(){
        $id = $_POST['id'];
        $reservationsModel = new ReservationsModel($this->getDatabaseConnection());
        if($reservationsModel->deleteById($id)){
            $this->msg("true", "Uspesno ste obrisali rezervaciju"); 
        }else{
            $this->msg("false", "Doslo je do greske, pokusajte ponovo");
        }
    }

    public function getReservationById(){
        $id = htmlspecialchars(strip_tags($_POST['id']));
        $reservation = new ReservationsModel($this->getDatabaseConnection());
        $rez = $reservation->getById($id);
        $this->set("rez",$rez);
    }

    public function editReservation(){
        
    }
}

?>