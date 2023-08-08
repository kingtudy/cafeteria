<?php
require_once "sys.php";

//$_POST este folosit pentru a prelua variabilele dintr-un formular
//$_REQUEST este folosit pentru a prelua variabilele dintr-un link

$id_supply = $_REQUEST['id'];
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


$query = 'update supply set name="' . $name . '", qty="' . $qty . '", supplier="' . $supplier . '", notes="' . $notes . '" where id_supply=' . $id_supply . ';';

$result = $link->query($query);

mysqli_close($link);

header("location: aprovizionare.php");
exit;
?>