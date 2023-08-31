<?php
require_once "sys.php";

$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['pass'];
$perm=$_POST['perm'];

if (!isset($name)){
    echo "Name not found<br />";
    exit;
}
if(!isset($email)) {
    echo "Mail not found<br />";
    exit;
}

if(!isset($password)) {
    echo "Password not found<br />";
    exit;
}

if(!isset($perm)) {
    echo "Permission not found<br />";
    exit;
}

$query_duplicate_mail = "select email from users where email = '".$email."'";
$result = mysqli_query($link, $query_duplicate_mail);
if(mysqli_num_rows($result) > 0) {
    echo "Mail already added<br />";
    exit;
} else {
    $query = "insert users (name,email,role,password) values ('".$name."', '".$email."', '".$perm."', '".password_hash($password, PASSWORD_DEFAULT)."');";
    $result = $link->query($query);
}

mysqli_close($link);
?>

<script type="text/javascript">
    alert("Account successfully created");
</script>

<?php
header("location: index_admin.php");
exit;
