<?php
require_once "sys.php";

$name=$_POST['name'];
$qty=$_POST['qty'];
$supplier=$_POST['supplier'];
$notes=$_POST['notes'];

if (!isset($name)){
    echo "Name missing<br />";
    exit;
}
if(!isset($qty)) {
    echo "Qty missing<br />";
    exit;
}
if(!isset($supplier)) {
    echo "Supplier missing<br />";
    exit;
}

$query = "insert into supply(name, qty, supplier, notes) values ('".$name."', '".$qty."', '".$supplier."', '".$notes."');";

$result = $link->query($query);

mysqli_close($link);

header("location: supplier.php");
exit;
