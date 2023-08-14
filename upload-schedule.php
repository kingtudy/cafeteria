<?php
$dir = dirname(__FILE__). "/res/upload/";
$target_file = $dir . basename($_FILES["fileToUpload"]["name"]);

if(is_dir($dir)) {

    if($open = opendir($dir)) {
        echo "File found<br>";
    } else {
        echo "File is not an image.<br>";
    }
}

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " was uploaded.";
} else {
    echo "Failed to upload the file";
} ?>
