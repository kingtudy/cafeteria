<?php
require_once "sys.php";

$id_menu = $_REQUEST['id'];
$name=$_POST['name'];
$description=$_POST['description'];
$mon=$_POST['monday'];
$tue=$_POST['tuesday'];
$wed=$_POST['wednesday'];
$thu=$_POST['thursday'];
$fri=$_POST['friday'];
$sat=$_POST['saturday'];
$sun=$_POST['sunday'];
$description=$_POST['description'];
$fas=$_POST['fasting'];
$veg=$_POST['vegetarian'];
$food_list=$_POST['food_list'];

if (!isset($name)){
    echo "Food name missing<br />";
    exit;
}

$query = 'update menu set name="' . $name . '", monday=' . $mon . ', tuesday=' . $tue . ', wednesday=' . $wed . ', thursday=' . $thu . ', friday=' . $fri . ', saturday=' . $sat . ', sunday=' . $sun . ', description="' . $description . '", fasting=' . $fas . ', vegetarian=' . $veg . ' where id_menu=' . $id_menu . ';';

$result = $link->query($query);

$food_on_the_menu_query = "delete from food_on_the_menu where id_menu = '".$id_menu."';";
$result = $link->query($food_on_the_menu_query);

foreach($food_list as $v) {
    $query2 = "insert into food_on_the_menu(id_menu, id_food) values (".$id_menu.", ".$v.");";
    $result = $link->query($query2);
}

mysqli_close($link);

header("location: menu-table.php");
exit;

?>