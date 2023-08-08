<?php
require_once "sys.php";

$name=$_POST['name'];
$type=$_POST['type'];
$price=$_POST['price'];
//$menu=$_POST['menu'];
$description=$_POST['description'];

if (!isset($name)){
    echo "Food name missing<br />";
    exit;
}
if(!isset($type)) {
    echo "Food type missing<br />";
    exit;
}
if($price <= 0) {
    echo "Food type missing<br />";
    exit;
}

$query = "insert into food(name, type, price, description) values ('".$name."', '".$type."', '".$price."', '".$description."');";

$result = $link->query($query);

mysqli_close($link);

header("location: table-food.php");
exit;
