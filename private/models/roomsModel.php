<?php 

namespace App\Models;

use App\Core\Model;

class RoomsModel extends Model{
    
    private $id;
    private $name;
    private $description;
    private $price;
    private $img;
    private $contact;
    private $idHouse;
    private $beds;
    private $person;

    public function addRoom($name,$description,$price,$img,$contact,$idHouse,$beds,$person){
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->img = $img;
        $this->contact = $contact;
        $this->idHouse = $idHouse;
        $this->beds = $beds;
        $this->person = $person;

        $sql = "INSERT INTO rooms SET room_name=:name, description=:description, price_per_day=:price, images=:img, contact=:contact, houses_idhouses=:idHouse, num_of_beds=:beds, max_persons=:person";
        $query = $this->getConnection()->prepare($sql);
        $query->bindParam(":name",$this->name);
        $query->bindParam(":description",$this->description);
        $query->bindParam(":price",$this->price);
        $query->bindParam(":img",$this->img);
        $query->bindParam(":contact",$this->contact);
        $query->bindParam(":idHouse",$this->idHouse);
        $query->bindParam(":beds",$this->beds);
        $query->bindParam(":person",$this->person);
            if($query->execute()){
                return true;
            }else {
                return false;
            }
    }

    public function getAllByHousesId($id){
        $this->id = $id;
        $sql = "SELECT*FROM rooms WHERE houses_idhouses=:id";
        $query = $this->getConnection()->prepare($sql);
        $query->bindParam(":id",$this->id);
        $rooms = $query->execute();
        $allRooms = [];
            if($rooms){
                $allRooms = $query->fetchAll(\PDO::FETCH_OBJ);
            }
            return $allRooms;
    }
    
}

?>