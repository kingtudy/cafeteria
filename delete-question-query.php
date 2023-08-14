<?php
require_once "sys.php";

$id_question=$_REQUEST['id'];

if (!isset($id_question)){
    echo "Delete error<br />";
    exit;
}

$query = 'delete from questions where id_question in ('.$id_question.');';

$result = $link->query($query);

mysqli_close($link);

header("location: questions.php");
exit;
