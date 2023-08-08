<?php
require_once "sys.php";

$user=$_POST['user'];
$description=$_POST['description'];
$date=$_POST['date'];
$food_list=$_POST['food_list'];

if (!isset($food_list)){
    echo "Nu ai adaugat mancare la comanda<br />";
    exit;
}

$query1 = "insert into order_data(order_date, status_id, order_email, order_desc) values ('".$date."', 2, '".$user."', '".$description."');";

$result = $link->query($query1);

$last_query = "select * from order_data ORDER BY id_order DESC LIMIT 1;";
$last_id = mysqli_query($link, $last_query);
$last_id = mysqli_fetch_array($last_id);
$last_id = $last_id["id_order"];

foreach($food_list as $v) {
    $query2 = "insert into order_food(id_order, id_food) values (".$last_id.", ".$v.");";
    $result = $link->query($query2);
}

mysqli_close($link);

header("location: order_cart.php");
exit;
