<?php 

namespace App\Models;

use App\Core\Model;

class ReservationsModel extends Model{

    private $start_time;
    private $end_time;
    private $price;
    private $user;
    private $room;
    private $persons;

    public function newReservation($start_time,$end_time,$price,$user,$room,$persons){
        $this->start_time = $start_time;
        $this->end_time = $end_time;
        $this->price = $price;
        $this->user = $user;
        $this->room = $room;
        $this->persons = $persons;

        $sql = "INSERT INTO reservations SET start_time=:start_time,end_time=:end_time,price=:price,users_idusers=:user,rooms_idrooms=:room,num_of_persons=:persons";
        $query = $this->getConnection()->prepare($sql);
        $query->bindParam(":start_time",$this->start_time);
        $query->bindParam(":end_time",$this->end_time);
        $query->bindParam(":price",$this->price);
        $query->bindParam(":user",$this->user);
        $query->bindParam(":room",$this->room);
        $query->bindParam(":persons",$this->persons);
            if($query->execute()){
                return true;
            }else {
                return false;
            }
    }

    public function getReservationByDate($start_time,$end_time,$room){
        $sql = "SELECT * FROM reservations
                WHERE start_time BETWEEN '$start_time' AND '$end_time'
                OR end_time BETWEEN '$start_time' AND '$end_time'
                AND rooms_idrooms='$room'";
        $query = $this->getConnection()->prepare($sql);
            if($query->execute()){
                $row = $query->rowCount();
                if($row == NULL){
                    return true;
                }else{
                    return false;
                }
            }
        
    }

    public function getReservationByUserId($user){
        $this->user = $user;
        $sql = "SELECT reservations.idreservations,reservations.start_time,reservations.end_time,reservations.price,reservations.num_of_persons,users.name,users.surname,rooms.room_name,houses.name AS 'house_name'
        FROM users 
        JOIN reservations ON reservations.users_idusers=users.idusers
        JOIN rooms ON reservations.rooms_idrooms=rooms.idrooms
        JOIN houses ON rooms.houses_idhouses=houses.idhouses
        WHERE users.idusers=:id";
        $query = $this->getConnection()->prepare($sql);
        $query->bindParam(":id",$this->user);
        $result = $query->execute();
        $data = [];
            if($result){
                $data = $query->fetchAll(\PDO::FETCH_OBJ);
            }
            return $data;
    }

    public function getAllReservations(){
        $sql = "SELECT reservations.start_time,reservations.end_time,reservations.price,reservations.num_of_persons,users.name,users.surname,rooms.room_name,houses.name AS 'house_name'
        FROM users 
        JOIN reservations ON reservations.users_idusers=users.idusers
        JOIN rooms ON reservations.rooms_idrooms=rooms.idrooms
        JOIN houses ON rooms.houses_idhouses=houses.idhouses";
        $query = $this->getConnection()->prepare($sql);
        $result = $query->execute();
        $data = [];
            if($result){
                $data = $query->fetchAll(\PDO::FETCH_OBJ);
            }
            return $data;
    }
}

?>