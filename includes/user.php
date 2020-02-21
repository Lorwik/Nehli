<?php
include 'db.php';

class User extends DB{
    private $nombre;
    private $username;

    public function userExists($user, $pass){
        $md5pass = md5($pass);
        $query = $this->connect()->prepare("SELECT * FROM usuarios WHERE username = '$user' AND password = '$md5pass'");
        $query->execute(['user' => $user, 'pass' => $md5pass]);

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    public function createUser($user, $pass, $email){
        $md5pass = md5($pass);
        $query = $this->connect()->prepare("INSERT INTO usuarios (username, password, email) VALUES '$user', '$md5pass', '$email'");
        $query->execute(['user' => $user, 'pass' => $md5pass]);

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    public function setUser($user){
        $query = $this->connect()->prepare("SELECT * FROM usuarios WHERE username = '$user'");
        $query->execute(['user' => $user]);
        
        foreach ($query as $currentUser) {
            $this->nombre = $currentUser['nombre'];
            $this->usename = $currentUser['username'];
        }
    }

    public function getNombre(){
        return $this->nombre;
    }
}

?>