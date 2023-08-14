<?php
require_once "sys.php";

$question=$_POST['question'];
$ans1=$_POST['ans1'];
$ans2=$_POST['ans2'];
$ans3=$_POST['ans3'];

if (!isset($question)){
    echo "Question not completed<br />";
    exit;
}

$query = "insert into questions(question, ans1, ans2, ans3) values ('".$question."','".$ans1."','".$ans2."','".$ans3."');";

$result = $link->query($query);

mysqli_close($link);

header("location: questions.php");
exit;
