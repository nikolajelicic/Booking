<?php 

namespace App\Models;

use App\Core\Model;

class HousesModel extends Model{

    private $name;
    private $description;
    private $img;
    private $city;
    private $address;
    private $id;
    private $first;
    private $last;
    
    public function addHouses($name,$description,$img,$city,$address,$id){
        $this->name = $name;
        $this->description = $description;
        $this->img = $img;
        $this->city = $city;
        $this->address = $address;
        $this->id = $id;

        $sql = "INSERT INTO houses SET name=:name, description=:description, images=:img, city=:city, address=:address, users_idusers=:id";
        $query = $this->getConnection()->prepare($sql);
        $query->bindParam(":name",$this->name);
        $query->bindParam(":description",$this->description);
        $query->bindParam(":img",$this->img);
        $query->bindParam(":city",$this->city);
        $query->bindParam(":address",$this->address);
        $query->bindParam(":id",$this->id);
            if($query->execute()){
                return true;
            }else{
                return false;
            }
    }
}

?>