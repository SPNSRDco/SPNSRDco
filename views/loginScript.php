<?php 
echo var_dump($_POST);
if (isset($_POST['username']) && isset($_POST['password'])) {
    try {
        $db = new PDO('sqlite:../user.db');
        echo $db->exec("SELECT * FROM users");
    }
    catch (PDOException $e) {
        echo "Error connecting to database: " . $e->getMessage();
    }
}
else {
    echo "error occoured";
}
?>