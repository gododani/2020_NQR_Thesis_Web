<?php
session_start();
require_once("../config/init.php");

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM felhasznalok WHERE felhasznalonev = '".$username."' AND jelszo = '".$password."'";

    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) != 0){
        session_start();
        if($username != "admin")
        {
            $_SESSION['username'] = $username;
            header('Location: index.php');
            exit();
        }
        else{
            $_SESSION['admin'] = $username;
            header('Location: index.php');
            exit();
        }
    }
    else{
        $_SESSION['loginError'] = $username;
        header("Location: loginForm.php");
    }
    
?>