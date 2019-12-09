<?php
    session_start(); // Starting Session

    $adminuser = 'admin';
    $adminpass = 'p@$$w0rd1';

    if(isset($_POST['username']) && isset($_POST['password'])){

        $username = $_POST['username'];
        $password = $_POST['password'];

        if($username === $adminuser){
            if($password === $adminpass){
                echo "Username and Password Match.";
                $_SESSION['login_user']=$username; // Initializing Session
                
            } else{
                echo "Password does not match.";}
        }
        else{
            if($password === $adminpass){
                echo "Username does not Match.";}
            else{
                echo "Username and Password does not Match.";}
        }
}


?>