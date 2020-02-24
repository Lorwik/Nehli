<?php
include 'db.php';

class User extends DB{
    private $username;

    public function userExists($user, $pass){
        $md5pass = md5($pass);
        $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE username = :user AND password = :pass');
        $query->execute(['user' => $user, 'pass' => $md5pass]);

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    public function setUser($user){
        $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE username = :user');
        $query->execute(['user' => $user]);
        
        foreach ($query as $currentUser) {
            $this->usename = $currentUser['username'];
        }
    }

    public function createUser($user, $pass, $email){
        $md5pass = md5($pass);
        $query = $this->connect()->prepare("INSERT INTO usuarios (username, password, email) VALUES ('$user', '$md5pass', '$email')");
        $query->execute();

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    public function getNombre(){
        return $this->username;
    }
}

?>