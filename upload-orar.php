<?php
$dir = dirname(__FILE__). "/res/upload/";
$target_file = $dir . basename($_FILES["fileToUpload"]["name"]);

if(is_dir($dir)) {

    if($open = opendir($dir)) {
        echo "Imagine gasita<br>";
    } else {
        echo "File is not an image.<br>";
    }
}

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "Fisierul ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " a fost incarcat.";
} else {
    echo "Nu s-a putut incarca poza";
} ?>
