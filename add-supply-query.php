<?php
require_once "sys.php";

$name=$_POST['name'];
$qty=$_POST['qty'];
$supplier=$_POST['supplier'];
$notes=$_POST['notes'];

if (!isset($name)){
    echo "Nu ai completat numele<br />";
    exit;
}
if(!isset($qty)) {
    echo "Nu ai completat cantitatea<br />";
    exit;
}
if(!isset($supplier)) {
    echo "Nu ai completat furnizorul<br />";
    exit;
}

$query = "insert into supply(name, qty, supplier, notes) values ('".$name."', '".$qty."', '".$supplier."', '".$notes."');";

$result = $link->query($query);

mysqli_close($link);

header("location: aprovizionare.php");
exit;
