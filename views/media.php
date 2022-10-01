<?php
header("Content-Type:image/png"); //passing the mimetype

$image = '../Web' . $_GET['image']; 

if(is_file($image) ||  is_file($image = "../web/logo.png"))
    readfile($image);
?>