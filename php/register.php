<?php
session_start();
require_once('../config/init.php');

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

$usernameValidation = '/(?=^.{6,30}$)^[a-zA-Z][a-zA-Z0-9]*[._-]?[a-zA-Z0-9]+$/';
$passwordValidation = '/(?=^.{8,30}$)(?=.*\d)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/';
$emailValidation = '/^([a-z\d\.-]+)@([a-z\d-]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/';

$sql = "SELECT felhasznalonev, email FROM felhasznalok WHERE felhasznalonev = ?";
$stmt = mysqli_stmt_init($conn);
if(mysqli_stmt_prepare($stmt, $sql)){
   mysqli_stmt_bind_param($stmt,"s", $username);
   mysqli_stmt_execute($stmt);
   mysqli_stmt_store_result($stmt);
   $resultCheck = mysqli_stmt_num_rows($stmt);
   if($resultCheck == 0){
       if(preg_match($usernameValidation, $username) && preg_match($passwordValidation, $password)  &&preg_match($emailValidation, $email) ){
           $sql2 = "INSERT INTO felhasznalok (felhasznalonev, jelszo, email) VALUES ('$username', '$password', '$email');";
           mysqli_query($conn, $sql2);
           //SIKERES REGISZTRÁCIÓ
           $_SESSION['validRegister'] = $username;
           header("Location: loginForm.php");
       }
       else{
           //SIKERTELEN REGISZTRÁCIÓ - HELYTELEN ADATOK
           $_SESSION['registerValidationError'] = $username;
           header("Location: registerForm.php");
       }
   }
   else{
       //SIKERTELEN REGISZTRÁCIÓ - FIÓK MÁR LÉTEZIK
       $_SESSION['registerDataError'] = $username;
       header("Location: registerForm.php");
   }
}
?>