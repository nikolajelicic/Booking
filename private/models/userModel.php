<?php 

namespace App\Models;

use App\Core\Model;

class UserModel extends Model{
    
    private $id;
    private $name;
    private $surname;
    private $email;
    private $password;
    private $oldPassword;

    public function addNewUser($name,$surname,$email,$password){
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->password = $password;
        $sql = "INSERT INTO users SET name=:name, surname=:surname, email=:email, password=:password, role_idrole=2";
        $query = $this->getConnection()->prepare($sql);
        $query->bindParam(":name",$this->name);
        $query->bindParam(":surname",$this->surname);
        $query->bindParam(":email",$this->email);
        $query->bindParam(":password",$this->password);
            if($query->execute()){
                return true;
            }else {
                return false;
            }
        }
    public function login($email,$password){
        $this->email = $email;
        $this->password = $password;
        $sql = "SELECT * FROM users WHERE email=:email AND password=:password";
        $query = $this->getConnection()->prepare($sql);
        $query->bindParam(":email",$this->email);
        $query->bindParam(":password",$this->password);
        $res = $query->execute();
        $users = [];
        if($res){
            $users = $query->fetchAll(\PDO::FETCH_OBJ);
        }
        return $users;
    }

    public function updatePassword($newPassword,$oldPassword,$id){
        $this->password = $newPassword;
        $this->oldPassword = $oldPassword;
        $this->id = $id;
        $sql = "UPDATE users SET password=:password WHERE idusers=:id AND password=:oldPassword";
        $query = $this->getConnection()->prepare($sql);
        $query->bindParam(":password",$this->password);
        $query->bindParam(":oldPassword",$this->oldPassword);
        $query->bindParam(":id",$this->id);
            if($query->execute()){
                return true;
            }else{
                return false;
            }
    }
}
?>