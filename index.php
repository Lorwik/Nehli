<?php
    include_once 'includes/user.php';
    include_once 'includes/user_session.php';

    $userSession = new UserSession();
    $user = new User();

    //¿Hay sesion?
    if(isset($_SESSION['user'])){
        //Si hay sesion simplemente vamos a incluir este codigo en la pagina actual
        $user->setUser($userSession->getCurrentUser());
        
        //Fix por si estamos en el index mientras estamos logeados, que nos lleve al home.php
        if (basename($_SERVER['PHP_SELF']) == "index.php"){
            header("refresh:0; url=home.php");
        }

    //¿Estamos logeando?
    }else if(isset($_POST['username']) && isset($_POST['password'])){
        
        $userForm = $_POST['username'];
        $passForm = $_POST['password'];

        $user = new User();
        //¿Existe el usuario?
        if($user->userExists($userForm, $passForm)){
            //echo "Existe el usuario";
            $userSession->setCurrentUser($userForm);
            $user->setUser($userForm);
            header("refresh:0; url=home.php");
        //Error
        }else{
            //echo "No existe el usuario";
            $errorLogin = "Nombre de usuario y/o password incorrecto";
            include_once 'login.php';
        }
    }else{
        //echo "login";
        include_once 'login.php';
    }
?>