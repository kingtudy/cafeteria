<?php
require_once "sys.php";

$name=$_POST['name'];
$description=$_POST['description'];
$mon=$_POST['monday'];
$tue=$_POST['tuesday'];
$wed=$_POST['wednesday'];
$thu=$_POST['thursday'];
$fri=$_POST['friday'];
$sat=$_POST['saturday'];
$sun=$_POST['sunday'];
$fas=$_POST['fasting'];
$veg=$_POST['vegetarian'];
$food_list=$_POST['food_list'];

if (!isset($name)){
    echo "Food name missing<br />";
    exit;
}

$query1 = "insert into menu(name, monday, tuesday, wednesday, thursday, friday, saturday, sunday, fasting, vegetarian, description) values ('".$name."', ".$mon.", ".$tue.", ".$wed.", ".$thu.", ".$fri.", ".$sat.", ".$sun.", ".$fas.", ".$veg.", '".$description."');";

$result = $link->query($query1);

$last_query = "select * from menu ORDER BY id_menu DESC LIMIT 1;";
$last_id = mysqli_query($link, $last_query);
$last_id = mysqli_fetch_array($last_id);
$last_id = $last_id["id_menu"];

foreach($food_list as $v) {
    $query2 = "insert into food_on_the_menu(id_menu, id_food) values (".$last_id.", ".$v.");";
    $result = $link->query($query2);
}

mysqli_close($link);

header("location: menu-table.php");
exit;
