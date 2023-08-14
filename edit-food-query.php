<?php
require_once "sys.php";

$id_food = $_REQUEST['id'];
$name = $_POST['name'];
$type = $_POST['type'];
$price = $_POST['price'];
$description = $_POST['description'];

if (!isset($name)) {
    echo "Food name missing<br />";
    exit;
}
if (!isset($type)) {
    echo "Food type missing<br />";
    exit;
}
if ($price <= 0) {
    echo "Food price missing<br />";
    exit;
}


$query = 'update food set name="' . $name . '", type="' . $type . '", price=' . $price . ', description="' . $description . '" where id_food=' . $id_food . ';';

$result = $link->query($query);

mysqli_close($link);

header("location: table-food.php");
exit;
?>