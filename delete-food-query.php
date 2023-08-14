<?php
require_once "sys.php";

$id_food=$_REQUEST['id'];

if (!isset($id_food)){
    echo "Delete error<br />";
    exit;
}

$query = 'delete from food where id_food in ('.$id_food.');';

$result = $link->query($query);

mysqli_close($link);

header("location: table-food.php");
exit;
