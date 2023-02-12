<?php
$conn = new mysqli("localhost","root", "", "karfelvetel", "3306");

if ($conn -> errno){
    die("Az adatbázishoz nem sikerült csatlakozni!");
}
if (!$conn ->set_charset("utf8")){
    echo "Karakterkódolás beállítása sikertelen!";
}
?>