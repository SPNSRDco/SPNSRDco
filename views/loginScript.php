<?php
if ((isset($_POST["email"]) && isset($_POST["password"])) && !(empty($_POST["email"]) && empty($_POST["password"]))) {
    try {
        $db = new SQLite3('../user.db'); // Connect to database
        $db->busyTimeout(1000);
        $query = $db->prepare("SELECT Password FROM users WHERE Email=?");
        $query->bindValue(1, $_POST["email"]);  
        $result = $query->execute();
        $result = $result->fetchArray();
        if (password_verify($_POST['password'], $result[0])) {
            echo "Login successful!";
            session_start();
            $db->close();
            unset($db);
            $db = new SQLite3('../user.db'); // Connect to database
            $db->busyTimeout(1000);
            $query = $db->prepare("UPDATE users SET SessionID=? WHERE Email=?");
            $query->bindValue(1, session_id());
            $query->bindValue(2, $_POST["email"]);
            $result = $query->execute();
            $db->close();
            unset($db);
            $db = new SQLite3('../user.db'); // Connect to database
            $db->busyTimeout(1000);
            $query = $db->prepare("SELECT Username FROM users WHERE Email=?");
            $query->bindValue(1, $_POST["email"]);
            $result = $query->execute();
            $_SESSION["name"] = $result->fetchArray()[0];
            $db->close();
            unset($db);
            header("Location: dash.php");
        } else {
            echo "Login failed. Please try again.";
            $db->close();
            unset($db);
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