<?php
session_start();
$backButt = "<br><button onclick='window.history.back()'>Go Back</button>";
if (!isset($_POST['newID']) || empty($_POST['newID'])) {
    echo "No ID entered";
    echo $backButt;
    return;
}
if ((session_id() == null) || empty(session_id())) {
    echo "You are not logged in";
    echo $backButt;
    return;
}
$db = new SQLite3('../user.db');
$db->busyTimeout(1000);
$query = $db->prepare("UPDATE users SET ChannelID=? WHERE SessionID=?");
$query->bindValue(1, $_POST['newID']);
$query->bindValue(2, session_id());
$result = $query->execute();
$db->close();
unset($db);
header("Location: dash.php");
?>