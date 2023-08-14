<?php
require_once "sys.php";

$id_supply=$_REQUEST['id'];

if (!isset($id_supply)){
    echo "Eroare stergere<br />";
    exit;
}

$query = 'delete from supply where id_supply in ('.$id_supply.');';

$result = $link->query($query);

mysqli_close($link);

header("location: supplier.php");
exit;
