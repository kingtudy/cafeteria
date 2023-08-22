<?php
session_start();

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    if($_SESSION["role"] === 'admin') {
        header("location: index_admin.php");
        exit;
    } else if($_SESSION["role"] === 'client') {
        header("location: index_client.php");
        exit;
    } else {
        echo 'Session error';
        exit;
    }
}

require_once "sys.php";

$email = $pass = $email_err = $pass_err = $login_err = "";

    if(empty(trim($_POST["email"]))) {
        $email_err = "Missing email";
    } else {
        $email = trim($_POST["email"]);
    }

    if(empty(trim($_POST["pass"]))){
        $pass_err = "Missing password";
    } else {
        $pass = trim($_POST["pass"]);
    }

    if(empty($email_err) && empty($pass_err)){
        $sql = "SELECT id_user, email, name, role, password FROM users WHERE email = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param);

            $param = $email;

            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1){
                    mysqli_stmt_bind_result($stmt, $user_id, $email, $name, $role, $hashed_pass);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($pass, $hashed_pass) === true){
                            session_start();

                            $_SESSION["loggedin"] = true;
                            $_SESSION["user_id"] = $user_id;
                            $_SESSION["email"] = $email;
                            $_SESSION["name"] = $name;
                            $_SESSION["role"] = $role;

                            if($_SESSION["role"] === 'admin') {
                                header("location: index_admin.php");
                                exit;
                            } else if($_SESSION["role"] === 'client') {
                                header("location: index_client.php");
                                exit;
                            } else {
                                echo 'Session error';
                                exit;
                            }
                        } else {
                            $login_err = "Mail or password invalid";
                        }
                    }
                } else {
                    $login_err = "Invalid login data";
                }
            } else{
                echo "ERROR! COUNT NOT CONNECT TO THE DATABASE!";
            }

            #Inchidere flux date
            mysqli_stmt_close($stmt);
        }
    }

    #Inchidere conexiune
    mysqli_close($link);

if(!empty($login_err)){
    echo '<div class="alert alert-danger">' . $login_err . '</div>';
} ?>