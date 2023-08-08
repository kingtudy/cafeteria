<?php
require_once "sys.php";

$id_order = $_REQUEST['id'];
$order_email=$_POST['user'];
$description=$_POST['description'];
$status = $_POST['status'];
$date=$_POST['date'];
$food_list=$_POST['food_list'];

if (empty($food_list)){
    echo "Nu ai adaugat mancare la comanda<br />";
    exit;
}

$query = 'update order_data set order_date="' . $date . '", status_id=' . $status . ', order_email="' . $order_email . '", order_desc="' . $description . '" where id_order=' . $id_order . ';';

$result = $link->query($query);

$order_food_query = "delete from order_food where id_order = '".$id_order."';";
$result = $link->query($order_food_query);

foreach($food_list as $v) {
    $query2 = "insert into order_food(id_order, id_food) values (".$id_order.", ".$v.");";
    $result = $link->query($query2);
}

mysqli_close($link);

header("location: order_cart.php");
exit;

?>