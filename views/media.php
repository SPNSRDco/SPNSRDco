<?php
header("Content-Type:image/png"); //passing the mimetype

$image = '../Web' . $_GET['image']; 

if (is_file($image) ||  is_file($image = "../web/".$_GET['image'])) {
    readfile($image);
}
?>