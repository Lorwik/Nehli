<?php
include 'db.php';

class User extends DB{
    private $username;
    private $email;

    //Funcion que comprueba si el usuario existe
    public function userExists($user, $pass){
        
        $contador = 0;

        $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE nombresito = :user');
        $query->execute(['user' => $user]);
        
        foreach ($query as $currentUser) {
            if (password_verify($pass, $currentUser['lapass'])){
                $contador++;
            }
        }

        if($contador>0){
            return true;
        }else{
            return false;
        }
    }

    //Funcion que comprueba si el usuario fue confirmado para poder logear
    public function userConfirmado($user){
        $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE nombresito = :user AND confirmado = 1');
        $query->execute(['user' => $user]);

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    //Funcion que comprueba si el usuario tiene activado el control parental
    public function userParental($user){
        $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE nombresito = :user AND parental = 1');
        $query->execute(['user' => $user]);

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    //Funcion que comprueba si el usuario es administrador
    public function userAdmin($user){
        $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE nombresito = :user AND poderoso = 1');
        $query->execute(['user' => $user]);

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    //Funcion para cambiar la contraseña del usuario
    public function userChangePass($user, $pass){
        $hashpass = password_hash($pass, PASSWORD_DEFAULT);
        $query = $this->connect()->prepare("UPDATE usuarios SET lapass = :hashpass WHERE nombresito = :user");
        $query->execute(['hashpass' => $hashpass, 'user' => $user]);

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    //Funcion para cambiar la configuracion de control parental
    public function userChangeParental($user, $parent){
        $query = $this->connect()->prepare('UPDATE usuarios SET parental = :parent WHERE nombresito = :user');
        $query->execute(['parent' => $parent, 'user' => $user]);

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    public function setUser($user){
        $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE nombresito = :user');
        $query->execute(['user' => $user]);
        
        foreach ($query as $currentUser) {
            $this->nombresito = $currentUser['nombresito'];
            $this->email = $currentUser['email'];
        }
    }

    //Funcion que comprueba si existe el usuario solo con el nombre
    public function ExisteUsuario($user){
        $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE nombresito = :user');
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
        $hashpass = password_hash($pass, PASSWORD_DEFAULT);
        $query = $this->connect()->prepare("INSERT INTO usuarios (nombresito, lapass, email) VALUES ('$user', '$hashpass', '$email')");
        $query->execute();

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    public function getUserName(){
        return $this->nombresito;
    }

    public function getEmail(){
        return $this->email;
    }
}

?>