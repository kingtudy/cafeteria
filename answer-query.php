<?php
require_once "sys.php";

foreach($_REQUEST as $k => $v) {
    $id_question=$k;
    $answer=$v;
    if (!isset($id_question)){
        echo "Nu s-a primit intrebarea<br />";
        exit;
    }
    if(!isset($answer)) {
        echo "Nu s-a primit raspunsul<br />";
        exit;
    }



$query = 'update questions set '.$answer.'_cont='.$answer.'_cont+1 where id_question=' . $id_question . ';';

$result = $link->query($query);
}

mysqli_close($link);
header("location: index_client.php");
exit;
