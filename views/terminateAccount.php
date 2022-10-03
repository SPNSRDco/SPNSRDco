<?php
session_start();
 $db = new SQLite3('../user.db'); // Connect to database
 $db->busyTimeout(1000);
 $query = $db->prepare("SELECT UserID, Password FROM users WHERE SessionID=?");
 $query->bindValue(1, session_id());
 $result = $query->execute();
 $result = $result->fetchArray();
 if ($result == null) {
     //header("Location: login.php");
     echo "not logged in";
     return;
 }
 if (password_verify($_POST["password"], $result["Password"])) {
     $query = $db->prepare("DELETE FROM users WHERE UserID=?");
     $query->bindValue(1, $result['UserID']);
     $result = $query->execute();
     $db->close();
     unset($db);
     header("Location: index.php");
 } else {
     echo "Incorrect password";
     echo "<br><button onclick='window.history.back()'>Go Back</button>";
 }
?>