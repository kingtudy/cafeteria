<?php
#debug
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once "functions.php";
?>
<!DOCTYPE html>
<html>

<head>
    <?php
    #init session
    session_start();
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
        if ($_SESSION["role"] === 'admin' && (strpos($_SERVER["REQUEST_URI"],"index_client.php") > 0 || strpos($_SERVER["REQUEST_URI"],"index.php") > 0)) {
            header("location: index_admin.php"); #if perms ok redirect to admin index
            exit;
        }
        if ($_SESSION["role"] === 'student' && (strpos($_SERVER["REQUEST_URI"],"index_admin.php") > 0 || strpos($_SERVER["REQUEST_URI"],"index.php") > 0)) {
            header("location: index_client.php");#if perms ok redirect to client index
            exit;
        }
    } else {
        if(strpos($_SERVER["REQUEST_URI"],"index.php") === false && strpos($_SERVER["REQUEST_URI"],"register.php") === false) {
            header("location: index.php");
            exit;
        }
    }
    ?>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <style type="text/css">
        <?php include_once dirname(__DIR__) . "/res/css/bootstrap.min.css"; ?>
        <?php include_once dirname(__DIR__) . "/res/css/bootstrap-grid.min.css"; ?>
        <?php include_once dirname(__DIR__) . "/res/css/bootstrap-reboot.min.css"; ?>
        <?php include_once dirname(__DIR__) . "/res/css/style.css"; ?>
        <?php include_once dirname(__DIR__) . "/res/css/responsive.css"; ?>
        <?php include_once dirname(__DIR__) . "/res/css/select2.min.css"; ?>
        <?php include_once dirname(__DIR__) . "/res/fontawesome/css/all.min.css"; ?>
    </style>
    <title>Cafeteria</title>
</head>

<body style="background-color: black">

<?php
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    include_once "widgets/status.php";
    if ($_SESSION["role"] === 'admin') {
        include "widgets/order_admin.php";
    } else if ($_SESSION["role"] === 'client') {
        include "widgets/order_client.php";
    }
}
