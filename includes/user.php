<?php
include 'db.php';

class User extends DB{
    private $username;
    private $email;

    //Funcion que comprueba si el usuario existe
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

    //Funcion que comprueba si el usuario fue confirmado para poder logear
    public function userConfirmado($user){
        $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE username = :user AND confirmado = 1');
        $query->execute(['user' => $user]);

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    //Funcion que comprueba si el usuario tiene activado el control parental
    public function userParental($user){
        $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE username = :user AND parental = 1');
        $query->execute(['user' => $user]);

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    //Funcion que comprueba si el usuario es administrador
    public function userAdmin($user){
        $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE username = :user AND admin = 1');
        $query->execute(['user' => $user]);

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    //Funcion para cambiar la contraseña del usuario
    public function userChangePass($user, $pass){
        $md5pass = md5($pass);
        $query = $this->connect()->prepare("UPDATE usuarios SET password = '$md5pass' WHERE username = '$user'");
        $query->execute();

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    //Funcion para cambiar la configuracion de control parental
    public function userChangeParental($user, $parent){
        $query = $this->connect()->prepare("UPDATE usuarios SET parental = '$parent' WHERE username = '$user'");
        $query->execute();

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
            $this->username = $currentUser['username'];
            $this->email = $currentUser['email'];
        }
    }

    //Funcion que comprueba si existe el usuario solo con el nombre
    public function ExisteUsuario($user){
        $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE username = :user');
        $query->execute(['user' => $user]);

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    //¿Existe email?
    public function ExisteEmail($email){
        $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE email = :email');
        $query->execute(['email' => $email]);

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    //Registramos un nuevo usuario
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

    public function getUserName(){
        return $this->username;
    }

    public function getEmail(){
        return $this->email;
    }
}

?>