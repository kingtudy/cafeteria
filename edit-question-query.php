<?php
require_once "sys.php";

$id_question = $_REQUEST['id'];
$question=$_POST['question'];
$ans1=$_POST['ans1'];
$ans2=$_POST['ans2'];
$ans3=$_POST['ans3'];

if (!isset($question)){
    echo "Nu ai completat intrebarea<br />";
    exit;
}

$query = 'update questions set question="' . $question . '", ans1="' . $ans1 . '", ans2="' . $ans2 . '", ans3="' . $ans3 . '" where id_question=' . $id_question . ';';

$result = $link->query($query);

mysqli_close($link);

header("location: questions.php");
exit; ?>