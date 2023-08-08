<?php
require_once "sys.php";

$id_forum=$_REQUEST['id'];

if (!isset($id_forum)){
    echo "Eroare stergere<br />";
    exit;
}

$query = 'delete from forum where id_message in ('.$id_forum.');';

$result = $link->query($query);

mysqli_close($link);

header("location: forum.php");
exit;
