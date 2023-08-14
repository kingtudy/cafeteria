<?php
require_once "sys.php";

$title=$_POST['title'];
$content=$_POST['content'];
$user_id=$_POST['userid'];

if (!isset($title)){
    echo "Title not added<br />";
    exit;
}
if(!isset($content)) {
    echo "Content not added<br />";
    exit;
}

$query_get_email = "select email from users where id_user = ".$user_id.";";
$result = mysqli_query($link, $query_get_email);
$email = mysqli_fetch_array($result);
$email = $email['email'];

$query = "insert into forum(title, email_user, content) values ('".$title."', '".$email."', '".$content."');";

$result = $link->query($query);

mysqli_close($link);

header("location: forum.php");
exit;
