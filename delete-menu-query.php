<?php
require_once "sys.php";

$id_menu=$_REQUEST['id'];

if (!isset($id_menu)){
    echo "Eroare stergere<br />";
    exit;
}

$query1 = 'delete from menu where id_menu in ('.$id_menu.');';

$result = $link->query($query1);

$query2 = 'delete from food_on_the_menu where id_menu in ('.$id_menu.');';

$result = $link->query($query2);

mysqli_close($link);

header("location: menu-table.php");
exit;
