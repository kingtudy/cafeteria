<?php
#Initializare sesiune
session_start();

#Resetare variabile ale sesiunii
$_SESSION = array();

#Distrugere sesiune
session_destroy();
echo 'user delogat'; #De facut apel alerta cu js
Sleep(5);
#Finalizare prin redirectionare login page
header("location: index.php");
exit;
?>