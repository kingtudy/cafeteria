<?php
#Database credentials:
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'mnotphqy_cafeteria_admin');
define('DB_PASSWORD', 'd?{1218]tQL]aab823r');
define('DB_NAME', 'mnotphqy_cafeteria');

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME); #Realizare conexiune baza

#Verifica conexiunea
if($link === false){
    die("ERROR: Nu s-a putut realiza conexiunea la baza - " . mysqli_connect_error());
}
?>