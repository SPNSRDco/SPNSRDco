<?php
if ((isset($_POST["email"]) && isset($_POST["password"])) && !(empty($_POST["email"]) && empty($_POST["password"]))) {
    try {
        $db = new SQLite3('../user.db'); // Connect to database
        $db->busyTimeout(1000);
        $query = $db->prepare("SELECT Password FROM users WHERE Email=?");
        $query->bindValue(1, $_POST["email"]);  
        $result = $query->execute();
        $result = $result->fetchArray();
        $db->close();
        unset($db);
        if (password_verify($_POST['password'], $result[0])) {
            echo "Login successful!";
            session_start();
            $db = new SQLite3('../user.db'); // Connect to database
            $db->busyTimeout(1000);
            $query = $db->prepare("UPDATE users SET SessionID=? WHERE Email=?");
            $query->bindValue(1, session_id());
            $query->bindValue(2, $_POST["email"]);  
            $result = $query->execute();
            $result = $result->fetchArray();
            $db->close();
            unset($db);
            header("Location: index.php");
        } else {
            echo "Login failed. Please try again.";
        }
    }
    catch (PDOException $e) {
        echo "Error connecting to database: " . $e->getMessage();
    }
}
else {
    echo "error occoured";
}
?>