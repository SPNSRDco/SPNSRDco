<?php 
session_start();
if (isset($_POST['username'])) {
    header("Location: index.php");
    exit();
}
?>