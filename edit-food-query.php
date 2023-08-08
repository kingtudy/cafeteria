<?php
require_once "sys.php";

//$_POST este folosit pentru a prelua variabilele dintr-un formular
//$_REQUEST este folosit pentru a prelua variabilele dintr-un link

$id_food = $_REQUEST['id'];
$name = $_POST['name'];
$type = $_POST['type'];
$price = $_POST['price'];
//$menu = $_POST['menu'];
$description = $_POST['description'];

if (!isset($name)) {
    echo "Nu ai completat numele mancarii<br />";
    exit;
}
if (!isset($type)) {
    echo "Nu ai completat tipul<br />";
    exit;
}
if ($price <= 0) {
    echo "Nu ai completat pretul<br />";
    exit;
}


$query = 'update food set name="' . $name . '", type="' . $type . '", price=' . $price . ', description="' . $description . '" where id_food=' . $id_food . ';';

$result = $link->query($query);

mysqli_close($link);

header("location: table-food.php");
exit;
?>