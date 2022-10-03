<?php 
class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
      parent::__construct($it, self::LEAVES_ONLY);
    }
}

function checkPassword($pwd, &$errors) {
    $errors_init = $errors;

    if (strlen($pwd) < 8) {
        $errors[] = "Password too short!";
    }

    if (!preg_match("#[0-9]+#", $pwd)) {
        $errors[] = "Password must include at least one number!";
    }

    if (!preg_match("#[a-zA-Z]+#", $pwd)) {
        $errors[] = "Password must include at least one letter!";
    }     

    return ($errors == $errors_init);
}

$backButton = "<br><button onclick='window.history.back()'>Back </button>";

if ((isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["email"])) && !(empty($_POST["username"]) && empty($_POST["password"]) && empty($_POST["email"]))) {
    $issues = checkPassword($_POST["password"], $errors);
    if ($errors) {
        echo "Your password does not meet the complexity requirements. See below.";
        foreach ($errors as $error) {
            echo "<br>" . $error;
        }
        echo $backButton;
        return;
    }
    try {
        $db = new SQLite3('../user.db'); // Connect to database
        $db->busyTimeout(1000);
        $query = $db->prepare("SELECT UserID FROM users WHERE Email=?");
        $query->bindValue(1, $_POST["email"]);  
        $result = $query->execute();
        $result = $result->fetchArray();
        $db->close();
        unset($db);
        if ($result) {
            echo "Email already in use by user: ".$result[0].". Please use a different email address.";
            echo $backButton;
            return;
        }
        genID:
        $db = new SQLite3('../user.db');
        $db->busyTimeout(1000);
        $tempUserID = uniqid();
        $query = $db->prepare("SELECT UserID FROM users WHERE UserID=?");
        $query->bindValue(1, $tempUserID);
        $result = $query->execute();
        $result = $result->fetchArray();
        $db->close();
        unset($db);
        if ($result) {
            goto genID;
        }
        $db = new SQLite3('../user.db');
        $db->busyTimeout(1000);
        $query = $db->prepare("INSERT INTO users (UserID, Username, Email, Password) VALUES (?, ?, ?, ?)");
        $query->bindValue(1, $tempUserID);
        $query->bindValue(2, strtolower($_POST["username"]));
        $query->bindValue(3, $_POST["email"]);
        $query->bindValue(4, password_hash($_POST["password"], PASSWORD_DEFAULT));
        $result = $query->execute();
        $db->close();
        unset($db);
        if ($result) {
            echo "User created successfully. Please login.";
            echo "<button onclick='window.location.href=\"login.php\"'>Login</button>";
            return;
        }
        else {
            echo "Error creating user.";
            echo $backButton;
            return;
        }
    }
    catch (PDOException $e) {
        echo "Error connecting to database: " . $e->getMessage();
    }
}
else {
    echo "An error occoured. Please ensure all fields are filled out";
    echo "<br><button onclick='window.history.back()'>Go Back</button>";
}
?>