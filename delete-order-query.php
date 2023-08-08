<?php
require_once "sys.php";

$id_order=$_REQUEST['id'];

if (!isset($id_order)){
    echo "Eroare stergere<br />";
    exit;
}

$query1 = 'delete from order_data where id_order in ('.$id_order.');';

$result = $link->query($query1);

$query2 = 'delete from order_food where id_order in ('.$id_order.');';

$result = $link->query($query2);

mysqli_close($link);

header("location: order_cart.php");
exit;
